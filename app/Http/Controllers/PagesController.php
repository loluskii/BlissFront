<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function subscription(){
        return view('subscription');
    }

    public function showStore(){
        $products = Product::take(10)->get();
        return view('store.index',['products' => $products]);
    }

    public function viewCart(){
        return view('store.cart');
    }

    public function billing(){
        return view('store.billing');
    }
}
