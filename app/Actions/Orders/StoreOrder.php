<?php

namespace App\Actions\Orders;

use App\Models\Order;
use App\Models\Address;
use App\Mail\OrderCreated;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StoreOrder{

    public function run($order, $amount, $subamount, $delivery_fee){
        $newOrder = new Order();
        $ref = Str::random(20);
        $address = new Address();

        $newOrder->order_number = uniqid('#');
        $newOrder->shipping_fname = $order->shipping_fname;
        $newOrder->shipping_lname = $order->shipping_lname;
        $newOrder->shipping_address = $order->shipping_address;
        $newOrder->shipping_city = $order->shipping_city;
        $newOrder->shipping_state = $order->shipping_state;
        $newOrder->shipping_phone = $order->shipping_phone;
        $newOrder->shipping_zipcode = $order->shipping_zipcode;
        $newOrder->shipping_landmark = $order->shipping_landmark;
        $newOrder->subtotal = $subamount;
        $newOrder->grand_total = $amount;
        $newOrder->item_count = \Cart::session(auth()->id())->getContent()->count();
        $newOrder->user_id = auth()->id();
        $newOrder->plan = $order->plan;
        $newOrder->payment_method = 'stripe';
        $newOrder->delivery_total = $delivery_fee;
        $newOrder->is_paid = 1;
        $newOrder->order_reference = $ref;

        $user_address = Address::where([
            ['user_id', '=' , auth()->id() ],
            ['shipping_fname', '=', $order->shipping_first_name],
            ['shipping_lname', '=', $order->shipping_last_name],
            ['shipping_address', '=', $order->shipping_street_address],
            ['shipping_phone', '=', $order->shipping_phone_number],
        ])->first();

        if ($user_address != null) {
            $newOrder->save();
            $cartItems =  \Cart::session(auth()->id())->getContent();
            foreach($cartItems as $item){
                $newOrder->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
            }
            return $ref;
        } else {
            $hasDefaultAddress = Address::where('user_id',auth()->id())->where('is_default',1);
            $address->user_id = auth()->id();
            $address->shipping_fname  = $order->shipping_first_name;
            $address->shipping_lname =  $order->shipping_last_name;
            $address->shipping_address =  $order->shipping_street_address;
            $address->shipping_landmark = $order->shipping_landmark;
            $address->shipping_city = $order->shipping_city;
            $address->shipping_state = $order->shipping_state;
            $address->shipping_zipcode = $order->shipping_postcode;
            $address->shipping_phone = $order->shipping_phone_number;
            if($hasDefaultAddress){
                $address->is_default = 0;
            }
            $address->save();
            $newOrder->save();
            $cartItems =  \Cart::session(auth()->id())->getContent();
            foreach($cartItems as $item){
                $newOrder->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
            }
            return $ref;
        }



    }

}



?>
