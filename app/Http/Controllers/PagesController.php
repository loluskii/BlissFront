<?php

namespace App\Http\Controllers;

use App\Models\Store;
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
        $products = Product::paginate(9);
        $categories = Category::all();
        $stores = Store::all();
        return view('store.index')->with('products', $products)->with('categories',$categories)->with('stores',$stores);
    }

    public function viewCart(){
        return view('store.cart');
    }

    public function subscribe(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('store.subscribe', compact('cartItems'));
    }
}
