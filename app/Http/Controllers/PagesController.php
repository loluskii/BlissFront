<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Store;
use App\Models\Product;
use App\Events\SendMail;
use App\Models\Category;
use Event;
use App\Services\Filters\FilterQueries;

class PagesController extends Controller
{
    public function subscription(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('subscription', compact('cartItems'));
    }

    public function showStore(){
        $categories = Category::all();
        $stores = Store::all();
        if(Request::get('category')){
            $checked = $_GET['category'];
            $products = Product::whereIn('category_id', $checked)->paginate(9);
        }else if(Request::get('store')){
            $checked = $_GET['store'];
            $products = Product::whereIn('store_id', $checked)->paginate(9);
        }else{
            $products = Product::paginate(9);
        }
        return view('store.index')->with('products', $products)->with('categories',$categories)->with('stores',$stores);
    }

    public function viewCart(){
        return view('store.cart');
    }

    public function subscribe(){
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('store.subscribe', compact('cartItems'));
    }

    public function filter(){

    }
}
