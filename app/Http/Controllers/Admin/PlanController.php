<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\User;
use App\Models\Order;
use App\Models\Plans;
use Illuminate\Http\Request;
use App\Actions\Plans\StorePlan;
use App\Models\PlanSubscription;
use App\Services\Plans\PlanQueries;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plans::all();
        return view('admin.plans.index')->with('plans', $plans);
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
        $request->validate([
            'name' => ['required'],
            'description' => ['requuired'],
        ]);

        try {
            $res = (new StorePlan())->run($request);
            if($res){
                return back()->with(
                    'success' , 'Plan Created!'
                );
            }else{
                return back()->with(
                    'error' , 'Plan could not be created!'
                );
            }
        } catch (\Exception $e) {
            return back()->with(
                'error' , $e->getMessage()
            );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plans::findOrFail($id);
        $subscribers = (new PlanQueries())->getTotalSubscribers($id);
        $users = (new PlanQueries())->getSubscribedUserDetails($id);
        $revenue = (new PlanQueries())->getPlanRevenue($plan->slug);
        $sales = (new PlanQueries())->getPlanTotalSales($plan->slug);
        // $orders = (new PlanQueries())->getSubscribedUserOrderDetails($id);

        // $order_details = array();
        // foreach($orders as $order){
        //     $order_details[] = Order::findOrFail($order);
        // }

        $subscribed_user = array();
        foreach($users as $user){
            $subscribed_user[] = User::findOrFail($user);
        }
        // dd($subscribed_user);
        return view('admin.plans.show')->with('plan',$plan)
                                    ->with('subscribers', $subscribers)
                                    ->with('users', $users)
                                    ->with('subscribed_user', $subscribed_user)
                                    ->with('revenue', $revenue)
                                    ->with('sales', $sales);
                                    // ->with('order_details', $order_details);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            DB::beginTransaction();
                $plan = Plans::find($id);
                $plan->name = $request->name ?? $plan->name;
                $plan->slug = $request->slug ?? $category->slug;
                $plan->interval = $request->interval_type ?? $plan->interval;
                $plan->interval_count = $request->count ?? $plan->interval_count;
                $plan->description = $request->desc ?? $plan->description;
                $plan->delivery_fee = $request->delivery_fee ?? $plan->delivery_fee;
                $plan->save();
            DB::commit();

            return back()->with(
                'success',
                'Plan updated successfully'
            );

        }catch(\Exception $e){
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    // public function endSubscription($plan, $user){
    //     $active_plan = Plans::find($plan);
    //     $subscribed_user = User::find($user);

    //     try{
    //         // DB::beginTransaction();
    //         //     $plan_subscriptions = PlanSubscription::where('user_id', $subscribed_user)->where('plan_id')

    //         // DB::commit();

    //         // return back()->with(
    //         //     'success',
    //         //     'Plan updated successfully'
    //         // );

    //     }catch(\Exception $e){
    //         return back()->with(
    //             'error',
    //             $e->getMessage()
    //         );
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
