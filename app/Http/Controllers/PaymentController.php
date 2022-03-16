<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function webhook(Request $request){
        try{
            $data = $request->all();
            switch ($data['type']){
                case 'charge.succeeded';
                $plan = Plan::findOrFail($data['data']['metadata']['plan_id']);
                $subamount = $data['data']['metadata']['subamount'];
                $delivery_fee = $plan->delivery_fee;
                $amount = $data['data']['object']['amount']/100;
                $payment_id = $data['data']['object']['id'];
                $res = (new StoreOrder())->run($data['data']['metadata']['order'], $amount, $subamount, $delivery_fee);
                $newOrder = (new OrderQueries())->findByRef($res);
                if($res){
                    $subscription = new PlanSubscription();
                    $subscription->user_id = $user->id;
                    $subscription->plan_id = $plan->id;
                    $subscription->order_id = $newOrder->id;
                    $subscription->start_date = Carbon::today();
                    $subscription->end_date = (Carbon::today())->addMonthsWithNoOverflow($plan->interval_count);
                    $subscription->created_at = Carbon::today();
                    $subscription->save();

                    (new StorePaymentRecord())->run($plan, $amount, $payment_id);
                    $admin = User::where('is_admin', 1)->get();
                    $user = Auth::user()->email;

                    NotifyAdminOnOrder::dispatch($newOrder, $admin);
                    SendOrderInvoice::dispatch($newOrder, $user)->delay(now()->addMinutes(3));

                }
                    break;
                default:
                    return 'webhook event not found';
            }
        }catch(Exception $e){

        }
    }
}
