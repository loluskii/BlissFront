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
    public function storeIndex(){
        $categories = Category::all();
        return view('store.i')->with('categories',$categories);
    }

    public function showStore(){
        $categories = Category::all();
        $stores = Store::all();
        $data = Request::all();
        if(Request::get('category')){
            $checked = $_GET['category'];
            $products = Product::where('category_id', $checked)->paginate(9);
        }else if(Request::get('store')){
            $checked = $_GET['store'];
            $products = Product::where('store_id', $checked)->paginate(9);
        }else{
            $products = Product::paginate(9);
        }
        return view('ses.store.index')->with('data',$data)->with('products', $products)->with('categories',$categories)->with('stores',$stores);
    }

    public function viewCart(){
        return view('ses.store.cart');
    }

public function filter(){

    }
}
