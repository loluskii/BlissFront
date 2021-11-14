<?php

namespace App\Services\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use DB;
use Exception;


class OrderQueries{

    public function findByRef($ref){
        return Order::firstWhere('order_reference', $ref);
    }



}

?>
