<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bookings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function blissitechHub(){
        $bookings = Bookings::all();
        return view('admin.services.blissitech', compact('bookings'));
    }
}
