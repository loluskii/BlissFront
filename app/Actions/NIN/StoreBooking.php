<?php

namespace App\Actions\NIN;
use App\Models\Bookings;
use App\Models\NINBooking;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class StoreBooking{


    public function store($request){
        $booking = new Bookings();
        $booking->fname = $request->fname;
        $booking->lname = $request->lname;
        $booking->email = $request->email;
        $booking->phone_no = $request->phone_no;
        $booking->category = $request->category;
        $booking->service = $request->service;
        $booking->service_center = $request->service_center;
        $booking->booking_date = $request->booking_date;
        $booking->booking_time_id = $request->booking_time_id;
        $booking->save();

        return true;
    }

}



?>
