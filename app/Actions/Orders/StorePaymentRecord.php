<?php
namespace App\Actions\Orders;

use App\Models\Order;
use App\Models\PaymentRecord;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class StorePaymentRecord{
    public function run($plan = null, $amount, $payment_id, $user_id = null){
        $payment = new PaymentRecord;
        $payment->user_id = $user_id ?? 0;
        $payment->plan_subscription_id = $plan->id ?? 0;
        $payment->amount = $amount;
        $payment->description = 'Payment for '. $plan->name ?? "NIN Registration";
        $payment->payment_id = $payment_id;
        $payment->save();

    }

}

?>
