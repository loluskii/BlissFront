<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function subscription(){
        return view('subscription');
    }

    public function showStore(){
        return view('store.index');
    }

    public function viewCart(){
        return view('store.cart');
    }

    public function billing(){
        return view('store.billing');
    }
}
