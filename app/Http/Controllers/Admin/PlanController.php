<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Plans;
use Illuminate\Http\Request;
use App\Actions\Plans\StorePlan;
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
        //
    }

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
