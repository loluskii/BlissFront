<?php

namespace App\Http\Controllers;

use \Stripe\Stripe;
use App\Models\Order;
use App\Models\Plans;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\Auth;
use Cart;

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
        $cartTotal = (\Cart::session(auth()->id())->getTotal());
        return view('store.payments', compact('plan', 'intent', 'order','cartTotal'));
    }

    public function createSubscription(Request $request, Plans $plan)
    {
        $plan = Plans::findOrFail($request->get('plan'));
        $user = $request->user();
        $paymentMethod = $request->paymentMethod;

        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->newSubscription($plan->slug, $plan->stripe_plan)
            ->create($paymentMethod, [
                'email' => $user->email,
            ]);

        // return response();

        return redirect()->route('home')->with('success', 'Your plan subscribed successfully');
    }


    public function retrievePlans() {
        $key = \config('services.stripe.secret');
        $stripe = new \Stripe\StripeClient($key);
        $plansraw = $stripe->plans->all();
        $plans = $plansraw->data;

        foreach($plans as $plan) {
            $prod = $stripe->products->retrieve(
                $plan->product,[]
            );
            $plan->product = $prod;
        }
        return $plans;
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
}
