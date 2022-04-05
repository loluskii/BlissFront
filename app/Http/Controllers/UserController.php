<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Actions\Users\AddAddress;
use App\Actions\Users\UpdateUser;
use App\Services\Plans\PlanQueries;
use App\Actions\Users\UpdateAddress;
use Illuminate\Support\Facades\Auth;
use App\Actions\Users\ChangePassword;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        $subscriptions = (new PlanQueries())->getUserSubscriptionDetails();
        $order_count = $user->orders->count();
        return view('ses.user.home')->with('subscriptions', $subscriptions)
                                ->with('order_count', $order_count);
    }

    public function userDetails(){
        $user = Auth::user();
        return view('ses.user.details')->with('user', $user);
    }

    public function updateUserDetails(Request $request){

        try {
            $res = (new UpdateUser())->run($request);
            return back()->with('success', 'Profile Updated');
        } catch (\Exception $e) {
            return back()->with(
                'error' , $e->getMessage()
            );
        }

        ;
    }

    public function getAddresses(){
        $user = Auth::user();
        $address = Address::where('user_id', $user->id)->get();

        return view('ses.user.address-book', compact('address'));
    }

    public function addNewAddress(Request $request){
    // dd($request->all());
        try {
            $res = (new AddAddress())->run($request);
            if($res){
                return back()->with('success', 'Profile Updated');
            }else{
                dd('error');
            }

        } catch (\Exception $e) {
            return back()->with(
                'error' , $e->getMessage()
            );
        }
    }

    public function deleteAddress(Address $id){
        $id->delete();
        return back()->with('success', 'Deleted!');
    }

    public function updateAddress(Request $request, $id){
        try {
            DB::beginTransaction();
                // dd($request);
                $address = Address::findOrFail($id);
                $address->shipping_fname  = $request['shipping_fname'] ?? $address->shipping_fname;
                $address->shipping_lname =  $request['shipping_lname'] ?? $address->shipping_lname;
                $address->shipping_address =  $request['shipping_street_address'] ?? $address->shipping_address;
                $address->shipping_landmark = $request['shipping_landmark'] ?? $address->shipping_landmark;
                $address->shipping_city = $request['shipping_city'] ?? $address->shipping_city;
                $address->shipping_state = $request['shipping_state'] ?? $address->shipping_state;
                $address->shipping_zipcode = $request['shipping_postcode'] ?? $address->shipping_zipcode;
                $address->shipping_phone = $request['shipping_phone_number'] ?? $address->shipping_phone;
                $address->update();
            DB::commit();
            return back()->with('success', 'Profile Updated');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function changePassword(){

        return view('ses.user.change-password');
    }

    public function updatePassword(Request $request){
        try{
            (new ChangePassword())->run($request);
            return back()->with(
                'success' , 'Password Updated'
            );
        }catch(\Exception $e){
            return back()->with(
                'error' , $e->getMessage()
            );
        }
    }

    public function getOrders(){
        $subscriptions = (new PlanQueries())->getUserSubscriptionDetails();
        return view('ses.user.my-orders')->with('subscriptions', $subscriptions);
    }

    // public function getOrderDetails($id){
    //     $order = Order::find($id);
    //     $order_ref = $order->order_reference;
    //     dd($order_ref);
    //     return redirect()->route('my-order.show',['ref' => $order_ref, 'id' => $id]);
    // }
}
