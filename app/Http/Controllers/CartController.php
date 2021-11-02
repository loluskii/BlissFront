<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public $userID;

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

    public function addToCart(Product $product){
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return back();
    }

    public function index(){
        $cartTotalQuantity = \Cart::session(auth()->id())->getContent()->count();
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('store.cart', compact('cartItems', 'cartTotalQuantity'));
    }

    public function update($id){
        \Cart::session(auth()->id())->update($id,[
            'quantity' =>  array(
                'relative' => false,
                'value' => request('quantity'),
            )
        ]);

        return back();
    }

    public function destroy($id)
    {
        $cartItems = \Cart::session(auth()->id())->remove($id);

        return back();
    }


    public function checkout(){
        $plans = $this->retrievePlans();
        $cartItems = \Cart::session(auth()->id())->getContent();
        $cartTotalQuantity = \Cart::session(auth()->id())->getContent()->count();
        return view('store.checkout', compact('cartItems','cartTotalQuantity','plans'));
    }
}

