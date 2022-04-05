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
        try {

            if(request()->has('shipping_fname')){
                $validatedData = $request->all();
            }else{
                $address = Address::findOrFail($request->address_id)->toArray();
                $validatedData = array_merge($request->toArray(), $address);
                // dd($new);
            }

            if(empty($request->session()->get('order'))){
                $order = new Order;
                $order->fill($validatedData);
                $request->session()->put('order', $order);
            }else{
                $order = $request->session()->get('order');
                $order->fill($validatedData);
                $request->session()->put('order', $order);
            }

            // dd(Session::get('order'));
            return redirect()->route('payment',['plan' => $validatedData['plan']]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

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
        return view('ses.user.order-info')->with('order',$order)->with('subscription',$subscription);
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
