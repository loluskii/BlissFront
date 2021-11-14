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
        $validatedData = $request->validate([
            'shipping_first_name' => 'required',
            'shipping_last_name' => 'required',
            'shipping_street_address'  => 'required',
            'shipping_city' => 'required',
            'shipping_state' => 'required',
            'shipping_phone_number' => 'required',
            'shipping_apartment_suite' => 'required',
            'plan' => 'required',
            'shipping_postcode' => 'required',
        ]);

        // $order = new Order();
        // $address = new Address();

        // $order->order_number = uniqid('ON');
        // $order->shipping_fname = $request->input('shipping_first_name');
        // $order->shipping_lname = $request->input('shipping_last_name');
        // $order->shipping_address = $request->input('shipping_street_address');
        // $order->shipping_city = $request->input('shipping_city');
        // $order->shipping_state = $request->input('shipping_state');
        // $order->shipping_phone = $request->input('shipping_phone_number');
        // $order->shipping_zipcode = $request->input('shipping_postcode');
        // $order->shipping_apartment_suite = $request->input('shipping_apartment_suite');

        // $order->grand_total = \Cart::session(auth()->id())->getTotal();
        // $order->item_count = \Cart::session(auth()->id())->getContent()->count();
        // $order->user_id = auth()->id();
        // $order->plan = $request->input('plan');
        // $order->payment_method = 'stripe';

        // if($request->has('save-info')){
        //     $address->user_id = auth()->id();
        //     $address->shipping_fname  = $request->input('shipping_first_name');
        //     $address->shipping_lname =  $request->input('shipping_last_name');
        //     $address->shipping_address =  $request->input('shipping_street_address');
        //     $address->shipping_apartment_suite = $request->input('shipping_apartment_suite');
        //     $address->shipping_city = $request->input('shipping_city');
        //     $address->shipping_state = $request->input('shipping_state');
        //     $address->shipping_zipcode = $request->input('shipping_postcode');
        //     $address->shipping_phone = $request->input('shipping_phone_number');
        //     $address->save();
        // }

        // $order->save();
        // $cartItems =  \Cart::session(auth()->id())->getContent();
        // foreach($cartItems as $item){
        //     $order->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
        // }

        if(empty($request->session()->get('order'))){
            $order = new Order;
            $order->fill($validatedData);
            $request->session()->put('order', $order);
        }else{
            $order = $request->session()->get('order');
            $order->fill($validatedData);
            $request->session()->put('order', $order);
        }
        return redirect()->route('pay',['plan' => $request->input('plan')]);

        // else{
        //     \Cart::session(auth()->id())->clear();
        //     Mail::to(Auth::user()->email)->send(new OrderCreated($order));
        //     return redirect()->route('home')->withMessage('Order has been placed');
        //     //send email to user that order will be delivered => create order-success page
        // }

        // return redirect()->route('home')->withMessage('Order has been placed');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('user.order-info')->with('order',$order);
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
