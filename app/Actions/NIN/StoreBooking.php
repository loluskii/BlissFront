<?php

namespace App\Actions\NIN;
use App\Models\NINBooking;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class StoreBooking{
    public function run($request){
        $booking = new NINBooking();
        $booking->fname = $request->fname;
        $booking->lname = $request->lname;
        $booking->email = $request->email;
        $booking->location_id = $request->location;
        $booking->category = $request->category;
        $booking->service = $request->service;
        $booking->service_center_id = $request->service_center_id;
        $booking->booking_date = $request->booking_date;
        $booking->booking_time_id = $request->booking_time_id;
        $booking->payment_status = 'pending';
        $booking->save();

        return $booking->id;
    }

}



?>
