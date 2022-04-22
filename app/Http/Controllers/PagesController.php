<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use App\Models\Bookings;
use App\Models\Category;
use App\Models\NINBooking;
use App\Models\NINLocation;
use Illuminate\Http\Request;
use App\Models\NINBookingTime;
use App\Actions\NIN\StoreBooking;
use App\Models\NINServiceCenters;

class PagesController extends Controller
{
    public function showStore()
    {
        $categories = Category::all();
        $stores = Store::all();
        $data = Request::all();
        if (Request::get('category')) {
            $checked = $_GET['category'];
            $products = Product::where('category_id', $checked)->paginate(9);
        } else if (Request::get('store')) {
            $checked = $_GET['store'];
            $products = Product::where('store_id', $checked)->paginate(9);
        } else {
            $products = Product::paginate(9);
        }
        return view('ses.store.index')->with('data', $data)->with('products', $products)->with('categories', $categories)->with('stores', $stores);
    }

    public function viewCart()
    {
        return view('ses.store.cart');
    }

    public function ninEnrolment()
    {
        return view('nin.index');
    }

    public function getTime(Request $request)
    {
        $date = $request->date;
        $booked = Bookings::select('booking_time_id')->where('booking_date', $date)->get();
        if ($booked->count() < 1) {
            $times = NINBookingTime::all();
            return response()->json(['status' => 'success', 'message' => $times]);
        } else {
            $times = NINBookingTime::whereNotIn('time', $booked)->get();
            return response()->json(['status' => 'success', 'message' => $times]);
        }
    }

    public function submitBooking(Request $request)
    {
        $res = (new StoreBooking())->store($request);
        if ($res) {
            return redirect()->route('nin.success')->with('success', 'Booking Receieved!');
        }else{
            return redirect()->route('nin.failure')->with('error', 'An Error occured!');
        }
    }

    public function bookingSuccess(){
        return view('nin.success');
    }

    public function bookingFailure(){
        return view('nin.failure');
    }



}
