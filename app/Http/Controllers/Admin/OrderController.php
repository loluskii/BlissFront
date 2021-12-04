<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\PlanSubscription;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        $order = Order::all();
        $subscriptions = PlanSubscription::all();
        $sales = Order::where('is_paid',1)->sum('subtotal');
        $profit = Order::sum('delivery_total');


        return view('admin.orders.index')->with('order', $order)->with('subscriptions', $subscriptions)->with('sales', $sales)->with('profit', $profit);
    }

    public function show($id){
        $order = Order::findOrFail($id);
        return view('admin.orders.show')->with('order', $order);
    }
}
