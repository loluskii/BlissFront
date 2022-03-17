<?php

namespace App\Services\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use DB;
use Exception;


class OrderQueries{

    public function findByRef($ref){
        return Order::where('order_reference', $ref)->firstOrFail();
    }
    public function getUserOrderDetails($id){
        $orders = DB::table('orders')->where('user_id', $id)->pluck('id');
        return $orders;
    }



}

?>
