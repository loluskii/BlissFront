<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use App\Models\Address;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public $userID;

    public function retrievePlans() {
        $plans = Plans::get();
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
        $address = Address::where('user_id', auth()->id())->first();
        return view('store.checkout', compact('cartItems','cartTotalQuantity','plans','address'));

    }

    public function updateAddress(Request $request, $id){
        $address =  Address::findOrFail($id);
        $address->shipping_fname = $request->shipping_fname ?? $address->shipping_fname;
        $address->shipping_lname = $request->shipping_lname ?? $address->shipping_lname;
        $address->shipping_address = $request->shipping_address ?? $address->shipping_address;
        $address->shipping_city = $request->shipping_city ?? $address->shipping_city;
        $address->shipping_landmark = $request->shipping_landmark ?? $address->shipping_landmark;
        $address->shipping_state = $request->shipping_state ?? $address->shipping_state;
        $address->shipping_zipcode = $request->shipping_zipcode ?? $address->shipping_zipcode;
        $address->shipping_phone = $request->shipping_phone ?? $address->shipping_phone;
        $address->update();

        return back()->with('success','Shipping Details updated!');

    }
}

