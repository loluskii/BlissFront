<?php

namespace Database\Seeders;

use App\Models\Plans;
use Illuminate\Database\Seeder;

class PlanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plans::create([
            "name" => 'Bi-Monthly Subscription',
            "slug" => 'bi_monthly',
            "interval" => 'months',
            "interval_count" => 2,
            "description" => 'Your order will be delivered to you every 2 months',
            "delivery_fee" => 3.98,
        ]);

        Plans::create([
            "name" => 'Quarterly Subscription',
            "slug" => 'quarterly',
            "interval" => 'months',
            "interval_count" => 4,
            "description" => 'Your order will be delivered to you every 4 months',
            "delivery_fee" => 7.96,
        ]);

        Plans::create([
            "name" => 'Bi-Annual Subscription',
            "slug" => 'bi_annual',
            "interval" => 'months',
            "interval_count" => 6,
            "description" => 'Your order will be delivered to you every 6 months',
            "delivery_fee" => 11.94,
        ]);

        Plans::create([
            "name" => 'Sesquibiannual Subscription',
            "slug" => 'sesquibiannual',
            "interval" => 'months',
            "interval_count" => 9,
            "description" => 'Your order will be delivered to you every 9 months',
            "delivery_fee" => 17.91,
        ]);

        Plans::create([
            "name" => 'Annual Subscription',
            "slug" => 'annual',
            "interval" => 'months',
            "interval_count" => 12,
            "description" => 'Your order will be delivered to you every 12 months',
            "delivery_fee" => 23.88,
        ]);
    }
}

