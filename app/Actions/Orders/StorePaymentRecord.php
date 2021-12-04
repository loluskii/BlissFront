<?php
namespace App\Actions\Orders;

use App\Models\Order;
use App\Models\PaymentRecord;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class StorePaymentRecord{
    public function run($plan, $amount, $payment_id){
        $payment = new PaymentRecord;
        $payment->user_id = Auth::id();
        $payment->plan_subscription_id = $plan->id;
        $payment->amount = $amount;
        $payment->description = 'Payment for '.$plan->name;
        $payment->payment_id = $payment_id;
        $payment->save();

    }

}

?>
