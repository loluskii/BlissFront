<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function subscription(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('subscription', compact('cartItems'));
    }

    public function showStore(){
        $products = Product::take(9)->get();
        $categories = Category::all();
        return view('store.index')->with('products', $products)->with('categories',$categories);
    }

    public function viewCart(){
        return view('store.cart');
    }

    public function subscribe(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('store.subscribe', compact('cartItems'));
    }
}
