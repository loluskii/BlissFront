<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Services\Plans\PlanQueries;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        $subscriptions = (new PlanQueries())->getUserSubscriptionDetails();
        $order_count = $user->orders->count();
        return view('user.home')->with('subscriptions', $subscriptions)
                                ->with('order_count', $order_count);
    }

    public function userDetails(){
        $user = Auth::user();
        return view('user.details')->with('user', $user);
    }

    public function updateUserDetails(Request $request){
        try {
            //code...
        } catch (\Exception $e) {
            //throw $th;
        }
    }

    public function getAddresses(){
        $user = Auth::user();
        $address = Address::where('user_id', $user->id)->get();

        return view('user.address-book', compact('address'));
    }

    public function getPaymentMethods(){
        $user = Auth::user();
        $paymentMethods = $user->paymentMethods();


        if ($user->hasDefaultPaymentMethod()) {
            $defaultPaymentMethod = $user->defaultPaymentMethod();
            // dd($paymentMethod);
        }
        // $pm = $paymentMethods->get(1);
        // foreach($paymentMethods as $pm){
        //     echo $pm->card.'<br>';
        // }
        return view('user.pm',compact('paymentMethods','defaultPaymentMethod'));
    }

    public function getOrders(){
        $subscriptions = (new PlanQueries())->getUserSubscriptionDetails();
        return view('user.my-orders')->with('subscriptions', $subscriptions);
    }

    public function getOrderDetails($id){
        $order = Order::find($id);
        $order_ref = $order->order_reference;
        dd($order_ref);
        return redirect()->route('my-order.show',['ref' => $order_ref]);
    }
}
