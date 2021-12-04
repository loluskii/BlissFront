<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Actions\Users\UserAction;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index(){
        $totalUsers = User::count();
        $recent_orders = Order::latest()->take(10)->get();
        $orders_count = Order::count();
        $sales = Order::where('is_paid',1)->sum('subtotal');
        $profit = Order::sum('delivery_total');

        $charts = UserAction::Charts();

        // dd($charts);

        return view('admin.index')->with('totalUsers', $totalUsers)
                                ->with('recent_orders', $recent_orders)
                                ->with('orders',$orders_count)
                                ->with('sales',$sales)
                                ->with('profit',$profit)
                                ->with('charts',$charts);
    }
}
