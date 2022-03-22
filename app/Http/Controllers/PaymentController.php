<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Plans;
use Illuminate\Http\Request;
use App\Models\PaymentRecord;
use App\Jobs\SendOrderInvoice;
use App\Jobs\NotifyAdminOnOrder;
use App\Models\PlanSubscription;
use App\Actions\Orders\StoreOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\Orders\OrderQueries;
use Illuminate\Support\Facades\Redirect;
use App\Actions\Orders\StorePaymentRecord;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    public function initPayment(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $plan = Plans::findOrFail($request->plan_id);
        $user = $request->user();
        $paymentMethod = $request->paymentMethod;
        $amount = $request->amount;
        $order = $request->session()->get('order');
        $subamount = \Cart::session(auth()->id())->getTotal() * $plan->interval_count;

        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => 'Bliss Explorers Subscription Package',
                    ],
                    'unit_amount' => $request->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'payment_intent_data' => [
                'metadata' => [
                    'plan_id' => $plan->id,
                    'order' => $order,
                    'subamount' => $subamount,
                    'user_id' => auth()->id(),
                    'order_items' => \Cart::session(auth()->id())->getContent(),
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('order.success'),
            'cancel_url' => route('order.failure'),
        ]);
        return redirect()->away($checkout_session->url);
    }

    //Handle Stripe Webhook
    public function webhook(Request $request)
    {
        try {
            $data = $request->all();
            $metadata = $data['data']['object']['metadata'];
            $user_id = $metadata['user_id'];
            switch ($data['type']) {
                case 'charge.succeeded':
                    $plan = Plans::findOrFail($metadata['plan_id']);
                    $subamount = $metadata['subamount'];
                    $delivery_fee = $plan->delivery_fee;
                    $amount = $data['data']['object']['amount'] / 100;
                    $payment_id = $data['data']['object']['id'];
                    $order_items = $metadata['order_items'];
                    $res = (new StoreOrder())->run(json_decode($metadata['order'], true), $amount, $subamount, $delivery_fee, $user_id, json_decode($metadata['order_items'], true) );
                    $newOrder = (new OrderQueries())->findByRef($res);
                    if ($newOrder) {
                        $subscription = new PlanSubscription();
                        $subscription->user_id = $user_id;
                        $subscription->plan_id = $plan->id;
                        $subscription->order_id = $newOrder->id;
                        $subscription->start_date = Carbon::today();
                        $subscription->end_date = (Carbon::today())->addMonthsWithNoOverflow($plan->interval_count);
                        $subscription->created_at = Carbon::today();
                        $subscription->save();

                        DB::beginTransaction();
                            if(PaymentRecord::where('payment_id', $payment_id)->first()){
                                throw new Exception('Payment Already made!');
                            }
                            (new StorePaymentRecord())->run($plan, $amount, $payment_id, $user_id);
                        DB::commit();
                        $admin = User::where('is_admin', 1)->get();
                        $user = User::findOrFail($user_id)->email;
                        NotifyAdminOnOrder::dispatch($newOrder, $admin);
                        SendOrderInvoice::dispatch($newOrder, $user)->delay(now()->addMinutes(3));
                    }
                    break;
                default:
                    return 'webhook event not found';
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function redirectToGateway(Request $request)
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
        return $e;
            // return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }
}
