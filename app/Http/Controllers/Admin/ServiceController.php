<?php

namespace App\Http\Controllers\Admin;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function blissitechHub(){
        $bookings = Enquiry::all();
        return view('admin.services.blissitech', compact('bookings'));
    }
}
