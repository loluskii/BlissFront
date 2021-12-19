<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\Plans\PlanQueries;
use App\Http\Controllers\Controller;
use App\Services\Orders\OrderQueries;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    public function blockedUsers(){
        $users = User::where('active',0);
        return view('admin.users.blocked')->with('users', $users);
    }

    public function show($id){
        $user = User::findOrFail($id);
        $orders = (new OrderQueries())->getUserOrderDetails($id);
        $no_of_subs = (new PlanQueries())->getUserTotalSubscriptions($id);
        $users_order = array();
        foreach($orders as $order){
            $users_order[] = Order::findOrFail($order);
        }
        return view('admin.users.show')->with('user',$user)->with('users_order', $users_order)->with('no_of_subs',$no_of_subs);
    }
}
