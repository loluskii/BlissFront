<?php

namespace App\Jobs\StripeWebhooks;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\WebhookClient\Models\WebhookCall;

class ChargeSucceededJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    /** @var \Spatie\WebhookClient\Models\WebhookCall */
    public $webhookCall;

    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $charge = $this->webhookCall->payload;
        $plan = Plans::findOrFail($charge['data']['metadata']['plan_id']);
        $subamount = $charge['data']['metadata']['subamount'];
        $delivery_fee = $plan->delivery_fee;
        $amount = $charge['data']['object']['amount'] / 100;
        $payment_id = $charge['data']['object']['id'];
        $res = (new StoreOrder())->run($charge['data']['metadata']['order'], $amount, $subamount, $delivery_fee);
        $newOrder = (new OrderQueries())->findByRef($res);
        if ($res) {
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

    }
}
