<?php

namespace App\Services\Plans;

use DB;
use Exception;
use App\Models\Order;
use App\Models\Plans;
use App\Models\PlanSubscription;
use Illuminate\Support\Facades\Auth;


class PlanQueries{

    public function findById($id){
        return Plans::find($id);
    }

    public function getUserSubscriptionDetails(){
        return Auth::user()->subscriptions;
    }

    public function getTotalsubscribers($id){
        return PlanSubscription::where('plan_id',$id)->count();
    }

    public function getSubscribedUserDetails($id){
        $users = DB::table('plan_subscriptions')->where('plan_id', $id)->pluck('user_id');
        return $users;
    }

    public function getSubscribedUserOrderDetails($id){
        $orders = DB::table('plan_subscriptions')->where('plan_id', $id)->pluck('order_id');
        return $orders;
    }

    public function getPlanRevenue($plan){
        return Order::where('plan',$plan)->sum('delivery_total');
    }

    public function getPlanTotalSales($plan){
        return Order::where('plan',$plan)->sum('subtotal');
    }

    public function getUserTotalSubscriptions($id){
        return PlanSubscription::distinct('plan_id')->where('user_id',$id)->count();
    }

}

?>
