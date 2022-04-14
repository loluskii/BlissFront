<?php

namespace App\Http\Controllers;

use App\Actions\NIN\StoreBooking;
use App\Models\Category;
use App\Models\NINBooking;
use App\Models\NINBookingTime;
use App\Models\NINLocation;
use App\Models\NINServiceCenters;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

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
        $locations = NINLocation::all();
        return view('nin.application-page', compact('locations'));
    }

    public function getLocation(Request $request)
    {
        $location_id = $request->location;
        $service_centers = NINServiceCenters::where('location_id', $location_id)->get();
        return response()->json(['status' => 'success', 'message' => $service_centers]);
    }

    public function getTime(Request $request)
    {
        $date = $request->date;
        $booked = NINBooking::select('booking_time_id')->where('booking_date', $date)->get();
        if ($booked->count() < 1) {
            $times = NINBookingTime::all();
            return response()->json(['status' => 'success', 'message' => $times]);
        } else {
            $times = NINBookingTime::whereNotIn('id', $booked)->get();
            return response()->json(['status' => 'success', 'message' => $times]);
        }
    }

    public function submitBooking(Request $request)
    {
        $res = (new StoreBooking())->run($request);
        if ($res) {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $amount = 40;
            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => 'NIN Registration Booking',
                        ],
                        'unit_amount' => $amount * 100,
                    ],
                    'quantity' => 1,
                ]],
                'payment_intent_data' => [
                    'metadata' => [
                        'booking_id'=> $res,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('nin.success'),
                'cancel_url' => route('nin.failure'),
            ]);
            return redirect()->away($checkout_session->url);
        }
    }

    public function ninBookingWebhook(Request $request)
    {
        try {
            $data = $request->all();
            $metadata = $data['data']['object']['metadata'];
            switch ($data['type']) {
                case 'charge.succeeded':
                    $amount = $data['data']['object']['amount'] / 100;
                    $payment_id = $data['data']['object']['id'];
                    $booking_id = $metadata['booking_id'];
                    DB::beginTransaction();
                        $booking = NINBooking::findOrFail($booking_id);
                        $booking->payment_status = "paid";
                        $booking->update();

                        if(PaymentRecord::where('payment_id', $payment_id)->first()){
                            throw new Exception('Payment Already made!');
                        }
                        (new StorePaymentRecord())->run($amount, $payment_id, $user_id);
                    DB::commit();
                    break;
                default:
                    return 'webhook event not found';
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function bookingSuccess(){
        return view('nin.success');
    }

    public function bookingFailure(){
        return view('nin.failure');
    }



}
