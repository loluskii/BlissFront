<?php

namespace App\Http\Controllers;

use Cart;
use Carbon\Carbon;
use \Stripe\Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\Plans;
use App\Mail\OrderCreated;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use App\Jobs\SendOrderCancel;
use App\Models\PaymentRecord;
use App\Jobs\SendOrderInvoice;
use App\Mail\AdminNotifyOrder;
use App\Jobs\NotifyAdminOnOrder;
use App\Models\PlanSubscription;
use App\Actions\Orders\StoreOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Services\Orders\OrderQueries;
use App\Actions\Orders\StorePaymentRecord;
use Laravel\Cashier\Exceptions\IncompletePayment;

class SubscriptionController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    }

    public function createPlan()
    {
        return view('plans.create');
    }
    public function getDeliveryTotal(){

    }

    public function storePlan(Request $request)
    {
        // $data = $request->except('_token');

        // $data['slug'] = strtolower($data['name']);
        // $price = $data['cost'] *100;

        // //create stripe product
        // $stripeProduct = $this->stripe->products->create([
        //     'name' => $data['name'],
        // ]);

        // //Stripe Plan Creation
        // $stripePlanCreation = $this->stripe->plans->create([
        //     'amount' => $price,
        //     'currency' => 'inr',
        //     'interval' => 'month', //  it can be day,week,month or year
        //     'product' => $stripeProduct->id,
        // ]);

        // $data['stripe_plan'] = $stripePlanCreation->id;

        // Plan::create($data);

        // echo 'plan has been created';
    }

    public function finalCheckout(Request $request,Plans $plan){
        try {
            // $paymentMethods = $request->user()->paymentMethods();
            $order = $request->session()->get('order');
            // $intent = $request->user()->createSetupIntent();
            $cartTotal = (\Cart::session(auth()->id())->getTotal() * $plan->interval_count) + $plan->delivery_fee;
            // dd($order);
            return view('store.payments', compact('plan', 'order','cartTotal'));
        } catch (\Exception $e) {
            return back()->with('error', 'Please check tour internet connection and try again');
        }
    }

    public function createSubscription(Request $request,$id)
    {
        // dd($request->all());
        $plan = Plans::findOrFail($id);
        $user = $request->user();
        $paymentMethod = $request->paymentMethod;
        $amount = $request->amount;
        $order = $request->session()->get('order');

        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => 'T-shirt',
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('order.success'),
                'cancel_url' => route('order.failure'),


            ]);

            header("HTTP/1.1 303 See Other");
            header("Location: " . $checkout_session->url);
            dd($checkout_session);
        } catch (\Exception $th) {
            //throw $th;
        }

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);

            $stripeCharge = $user->charge($amount * 100, $paymentMethod,['receipt_email' => $user->email]);
            $payment_id= $stripeCharge->jsonSerialize()['id'];
            $subamount = \Cart::session(auth()->id())->getTotal() * $plan->interval_count;
            $delivery_fee = $plan->delivery_fee;
            $res = (new StoreOrder())->run($order, $amount, $subamount, $delivery_fee);
            $newOrder = (new OrderQueries())->findByRef($res);
            if($res){
                $subscription = new PlanSubscription();
                $subscription->user_id = $user->id;
                $subscription->plan_id = $plan->id;
                $subscription->order_id = $newOrder->id;
                $subscription->start_date = Carbon::today();
                $subscription->end_date = (Carbon::today())->addMonthsWithNoOverflow($plan->interval_count);
                $subscription->created_at = Carbon::today();
                $subscription->save();

                (new StorePaymentRecord())->run($plan, $amount, $payment_id);
                $admin = User::where('is_admin', 1)->get();
                $user = Auth::user()->email;

                NotifyAdminOnOrder::dispatch($newOrder, $admin);
                SendOrderInvoice::dispatch($newOrder, $user)->delay(now()->addMinutes(3));

            }
            \Cart::session(auth()->id())->clear();
            $request->session()->forget('order');
            return view('order.order-success');

        } catch (IncompletePayment $e) {
            return redirect()->route(
                'cashier.payment',
                [$e->payment->id, 'redirect' => route('home')]
            );
            // DB::rollback();
            // return view('order.order-failure')->with('error',$e->getMessage());
        }
    }

    public function getResponse(Request $request){
        $status = request()->success;
        if($status){

        }
    }

    public function showSubscription() {
        $plans = $this->retrievePlans();
        $user = Auth::user();

        return view('seller.pages.subscribe', [
            'user'=>$user,
            'intent' => $user->createSetupIntent(),
            'plans' => $plans
        ]);
    }

    public function cancelSubscription($id){
        try {
            $subscription = PlanSubscription::findOrFail($id);
            // $order = Order::findOrFail($subscription->order_id);
            $subscription->end_date = NOW();
            $subscription->update();
            $user = Auth::user();
            SendOrderCancel::dispatch($user);
            return redirect()->route('user.my_orders')->with('success', 'Subscription cancelled successfully!');
        } catch (\Exception $e) {
            return back()->with('error','Please check your internet connection');
        }

    }
}
