<?php

namespace Database\Seeders;

use App\Models\NINBookingTime;
use Illuminate\Database\Seeder;

class NINBookingTimeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NINBookingTime::create([
            'time' => '8:30am',
        ]);
        NINBookingTime::create([
            'time' => '8:45am',
        ]);
        NINBookingTime::create([
            'time' => '9:00am',
        ]);
        NINBookingTime::create([
            'time' => '9:15am',
        ]);
        NINBookingTime::create([
            'time' => '9:30am',
        ]);
        //=====//
        NINBookingTime::create([
            'time' => '9:45am',
        ]);
        NINBookingTime::create([
            'time' => '10:00am',
        ]);
        NINBookingTime::create([
            'time' => '10:15am',
        ]);
        NINBookingTime::create([
            'time' => '10:30am',
        ]);
        NINBookingTime::create([
            'time' => '10:45am',
        ]);
        NINBookingTime::create([
            'time' => '11:00am',
        ]);
        //=====//
        NINBookingTime::create([
            'time' => '11:15am',
        ]);
        NINBookingTime::create([
            'time' => '11:30am',
        ]);
        NINBookingTime::create([
            'time' => '11:45am',
        ]);
        NINBookingTime::create([
            'time' => '12:00pm',
        ]);
        //=====//
        NINBookingTime::create([
            'time' => '12:15pm',
        ]);
        NINBookingTime::create([
            'time' => '12:30pm',
        ]);
        NINBookingTime::create([
            'time' => '12:45pm',
        ]);
        NINBookingTime::create([
            'time' => '13:00pm',
        ]);
        //=====//
        NINBookingTime::create([
            'time' => '13:15pm',
        ]);
        NINBookingTime::create([
            'time' => '13:30pm',
        ]);
        NINBookingTime::create([
            'time' => '13:45pm',
        ]);
        NINBookingTime::create([
            'time' => '14:00pm',
        ]);

    }
}
