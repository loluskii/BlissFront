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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Services\Orders\OrderQueries;
use App\Actions\Orders\StorePaymentRecord;

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
        $paymentMethods = $request->user()->paymentMethods();
        $order = $request->session()->get('order');
        $intent = $request->user()->createSetupIntent();
        $cartTotal = (\Cart::session(auth()->id())->getTotal() * $plan->interval_count) + $plan->delivery_fee;
        // dd($order);
        return view('store.payments', compact('plan', 'intent', 'order','cartTotal'));
    }

    public function createSubscription(Request $request,$id)
    {
        $plan = Plans::findOrFail($id);
        $user = $request->user();
        $paymentMethod = $request->paymentMethod;
        $amount = $request->amount;
        $order = $request->session()->get('order');

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            // $stripeCharge = $this->stripe->charges->create([
            //     'amount' => $amount * 100,
            //     'currency' => 'gbp',
            //     'customer' => $customer['id'],
            //     'source' => $paymentMethod,
            //     'description' => 'Payment for '.$plan->name,
            //     'receipt_email' => $user->email,
            //     'shipping' => [
            //         'address' => $order->shipping_street_address.' ,'.$order->shipping_city.', '.$order->shipping_state,
            //         'name' => $order->shipping_first_name.' '.$order->shipping_last_name,
            //         'phone' => $order->shipping_phone_number,
            //     ]
            // ]);
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

        } catch (\Exception $e) {
            return view('order.order-failure')->with('error',$e->getMessage());
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
        $subscription = PlanSubscription::findOrFail($id);
        // $order = Order::findOrFail($subscription->order_id);
        $subscription->end_date = NOW();
        $subscription->update();
        $user = Auth::user();


        SendOrderCancel::dispatch($user);





        return redirect()->route('user.my_orders')->with('success', 'Subscription cancelled successfully!');

    }
}
