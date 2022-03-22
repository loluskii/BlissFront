<?php

namespace App\Actions\Orders;

use App\Models\Order;
use App\Models\Address;
use App\Mail\OrderCreated;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StoreOrder{

    public function run($order, $amount, $subamount, $delivery_fee, $user_id = null, $orderItems = null){
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
        $newOrder->shipping_landmark = $order->shipping_landmark ?? 'none';
        $newOrder->subtotal = $subamount;
        $newOrder->grand_total = $amount;
        $newOrder->item_count = auth()->check() ? \Cart::session(auth()->id())->getContent()->count() : count($orderItems);
        $newOrder->user_id = auth()->check() ? auth()->id() : $user_id;
        $newOrder->plan = $order->plan;
        $newOrder->payment_method = 'stripe';
        $newOrder->delivery_total = $delivery_fee;
        $newOrder->is_paid = 1;
        $newOrder->order_reference = $ref;
        if(property_exists($order, 'has_pm_package')){
            $newOrder->has_pm_package = true;
            $newOrder->pm_fname = $order->pm_fname;
            $newOrder->pm_lname = $order->pm_lname;
            $newOrder->pm_country = $order->pm_country;
            $newOrder->pm_phone_no = $order->pm_phone_no;
            $newOrder->pm_bank_name = $order->pm_bank_name;
            $newOrder->pm_acct_no = $order->pm_acct_no;
        }

        $user_address = Address::where([
            ['user_id', '=' , auth()->check() ? auth()->id() : $user_id ],
            ['shipping_fname', '=', $order->shipping_fname],
            ['shipping_lname', '=', $order->shipping_lname],
            ['shipping_address', '=', $order->shipping_address],
            ['shipping_phone', '=', $order->shipping_phone],
        ])->first();

        if ($user_address != null) {
            $newOrder->save();
            $cartItems = auth()->check() ? \Cart::session(auth()->id())->getContent() : $orderItems;
            foreach($cartItems as $item){
                $newOrder->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
            }
            return $ref;
        } else {
            $hasDefaultAddress = Address::where('user_id',auth()->check() ? auth()->id() : $user_id)->where('is_default',1);
            $address->user_id = auth()->check() ? auth()->id() : $user_id;
            $address->shipping_fname  = $order->shipping_fname;
            $address->shipping_lname =  $order->shipping_lname;
            $address->shipping_address =  $order->shipping_address;
            $address->shipping_landmark = $order->shipping_landmark ?? 'none';
            $address->shipping_city = $order->shipping_city;
            $address->shipping_state = $order->shipping_state;
            $address->shipping_zipcode = $order->shipping_zipcode;
            $address->shipping_phone = $order->shipping_phone;
            if($hasDefaultAddress){
                $address->is_default = 0;
            }
            $address->save();
            $newOrder->save();
            $cartItems = auth()->check() ? \Cart::session(auth()->id())->getContent() : $orderItems;
            foreach($cartItems as $item){
                $newOrder->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
            }
            return $ref;
        }
    }

}



?>
