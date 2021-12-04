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
        $newOrder->shipping_fname = $order->shipping_first_name;
        $newOrder->shipping_lname = $order->shipping_last_name;
        $newOrder->shipping_address = $order->shipping_street_address;
        $newOrder->shipping_city = $order->shipping_city;
        $newOrder->shipping_state = $order->shipping_state;
        $newOrder->shipping_phone = $order->shipping_phone_number;
        $newOrder->shipping_zipcode = $order->shipping_postcode;
        $newOrder->shipping_apartment_suite = $order->shipping_apartment_suite;
        $newOrder->subtotal = $subamount;
        $newOrder->grand_total = $amount;
        $newOrder->item_count = \Cart::session(auth()->id())->getContent()->count();
        $newOrder->user_id = auth()->id();
        $newOrder->plan = $order->plan;
        $newOrder->payment_method = 'stripe';
        $newOrder->delivery_total = $delivery_fee;
        $newOrder->is_paid = 1;
        $newOrder->order_reference = $ref;

        $address->user_id = auth()->id();
        $address->shipping_fname  = $order->shipping_first_name;
        $address->shipping_lname =  $order->shipping_last_name;
        $address->shipping_address =  $order->shipping_street_address;
        $address->shipping_apartment_suite = $order->shipping_apartment_suite;
        $address->shipping_city = $order->shipping_city;
        $address->shipping_state = $order->shipping_state;
        $address->shipping_zipcode = $order->shipping_postcode;
        $address->shipping_phone = $order->shipping_phone_number;
        $address->save();


        $newOrder->save();
        $cartItems =  \Cart::session(auth()->id())->getContent();
        foreach($cartItems as $item){
            $newOrder->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
        }

        Mail::to(Auth::user()->email)->send(new OrderCreated($order));

        return $ref;
    }

}



?>
