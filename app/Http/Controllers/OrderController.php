<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use App\Mail\OrderCreated;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'shipping_first_name' => 'required',
            'shipping_last_name' => 'required',
            'shipping_street_address'  => 'required',
            'shipping_city' => 'required',
            'shipping_state' => 'required',
            'shipping_phone_number' => 'required',
        ]);

        // dd($request);

        $order = new Order();
        $address = new Address();

        $order->order_number = uniqid('ON');
        $order->shipping_fname = $request->input('shipping_first_name');
        $order->shipping_lname = $request->input('shipping_last_name');
        $order->shipping_address = $request->input('shipping_street_address');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_state = $request->input('shipping_state');
        $order->shipping_phone = $request->input('shipping_phone_number');
        $order->shipping_zipcode = $request->input('shipping_postcode');
        $order->shipping_apartment_suite = $request->input('shipping_apartment_suite');

        $order->grand_total = \Cart::session(auth()->id())->getTotal();
        $order->item_count = \Cart::session(auth()->id())->getContent()->count();
        $order->user_id = auth()->id();

        if($request->has('not-same-address')){
            $order->billing_fname = $request->input('shipping_first_name');
            $order->billing_lname = $request->input('shipping_last_name');
            $order->billing_address = $request->input('billing_address');
            $order->billing_apartment_suite = $request->input('billing_apartment_suite');
            $order->billing_city = $request->input('billing_city');
            $order->billing_state = $request->input('billing_state');
            $order->billing_phone = $request->input('billing_phone');
            $order->billing_zipcode = $request->input('billing_postcode');
        }

        if($request->has('save-info')){
            $address->user_id = auth()->id();
            $address->shipping_fname  = $request->input('shipping_first_name');
            $address->shipping_lname =  $request->input('shipping_last_name');
            $address->shipping_address =  $request->input('shipping_street_address');
            $address->shipping_apartment_suite = $request->input('shipping_apartment_suite');
            $address->shipping_city = $request->input('shipping_city');
            $address->shipping_state = $request->input('shipping_state');
            $address->shipping_zipcode = $request->input('shipping_postcode');
            $address->shipping_phone = $request->input('shipping_phone_number');
            $address->save();
        }

        if (request('payment') == 'stripe') {
            $order->payment_method = 'stripe';
        }

        $order->save();
        $cartItems =  \Cart::session(auth()->id())->getContent();
        foreach($cartItems as $item){
            $order->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
        }

        \Cart::session(auth()->id())->clear();

        if(request('payment') == 'stripe'){
            dd('redirect to stripe checkout');
        }else{
            Mail::to(Auth::user()->email)->send(new OrderCreated($order));
            return redirect()->route('home')->withMessage('Order has been placed');
            //send email to user that order will be delivered => create order-success page
        }

        // return redirect()->route('home')->withMessage('Order has been placed');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
