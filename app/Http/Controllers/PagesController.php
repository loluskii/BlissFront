<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function subscription(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('subscription', compact('cartItems'));
    }

    public function showStore(){
        $products = Product::take(9)->get();
        return view('store.index',['products' => $products]);
    }

    public function viewCart(){
        return view('store.cart');
    }

    public function subscribe(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('store.subscribe', compact('cartItems'));
    }
}
