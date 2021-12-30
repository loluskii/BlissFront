<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use App\Mail\OrderCreated;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\PlanSubscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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
        if(request()->has('shipping_first_name')){
            $validatedData = $request->validate([
                'shipping_first_name' => 'required',
                'shipping_last_name' => 'required',
                'shipping_street_address'  => 'required',
                'shipping_city' => 'required',
                'shipping_state' => 'required',
                'shipping_phone_number' => 'required',
                'shipping_landmark' => 'required',
                'plan' => 'required',
                'shipping_postcode' => 'required',
            ]);
        }else{
            $address = Address::findOrFail($request->address_id)->toArray();
            $new = array_merge($request->toArray(), $address);
            // dd($new);
        }

        // dd($validatedData);

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
        // $order->shipping_landmark = $request->input('shipping_landmark');

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
        //     $address->shipping_landmark = $request->input('shipping_landmark');
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
            $order->fill($new);
            $request->session()->put('order', $order);
        }else{
            $order = $request->session()->get('order');
            $order->fill($new);
            $request->session()->put('order', $order);
        }

        // dd(Session::get('order'));
        return redirect()->route('pay',['plan' => $new['plan']]);

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
        $subscription = PlanSubscription::findOrFail($id);
        return view('user.order-info')->with('order',$order)->with('subscription',$subscription);
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
