<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public $userID;

    public function addToCart(Product $id){
        if(Auth::check()){
            $userID = Auth::id();
        }else{
            session_start();
            $userID = session_create_id();
        }
        dd($userID);
    }
}

