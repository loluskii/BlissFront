<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Store;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function showStore()
    {
        $categories = Category::all();
        $stores = Store::all();
        $data = Request::all();
        if (Request::get('category')) {
            $checked = $_GET['category'];
            $products = Product::where('category_id', $checked)->paginate(9);
        } else if (Request::get('store')) {
            $checked = $_GET['store'];
            $products = Product::where('store_id', $checked)->paginate(9);
        } else {
            $products = Product::paginate(9);
        }
        return view('ses.store.index')->with('data', $data)->with('products', $products)->with('categories', $categories)->with('stores', $stores);
    }

    public function viewCart()
    {
        return view('ses.store.cart');
    }

    public function ninEnrolment()
    {
        return view('nin.index');
    }

    public function enquiryForm(Request $request){
        try {
            Enquiry::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message
            ]);
            return back()->with('success','Message Received');

        } catch (\Exception $e) {
            return back()->with('error',$e->getMessage());
        }
    }



}
