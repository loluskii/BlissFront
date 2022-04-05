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

    public function finalCheckout(Request $request,Plans $plan){
        try {
            // $paymentMethods = $request->user()->paymentMethods();
            $order = $request->session()->get('order');
            // $intent = $request->user()->createSetupIntent();
            $cartTotal = (\Cart::session(auth()->id())->getTotal() * $plan->interval_count) + $plan->delivery_fee;
            // dd($order);
            return view('ses.store.payments', compact('plan', 'order','cartTotal'));
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
        } catch (\Exception $th) {
            //throw $th;
        }
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
