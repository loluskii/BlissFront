<?php
namespace App\Actions\Users;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AddAddress
{
    public static function run($request){
        DB::beginTransaction();
        // dd($request);
        $address = new Address();
        $hasDefaultAddress = Address::where('user_id',auth()->id())->where('is_default',1);
        $address->user_id = auth()->id();
        $address->shipping_fname  = $request->shipping_fname;
        $address->shipping_lname =  $request->shipping_lname;
        $address->shipping_address =  $request->shipping_street_address;
        $address->shipping_landmark = $request->shipping_landmark;
        $address->shipping_city = $request->shipping_city;
        $address->shipping_state = $request->shipping_state;
        $address->shipping_zipcode = $request->shipping_postcode;
        $address->shipping_phone = $request->shipping_phone_number;
        if($hasDefaultAddress){
            $address->is_default = 0;
        }
        $address->save();
        DB::commit();

        return true;
    }

}
?>
