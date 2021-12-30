<?php
namespace App\Actions\Users;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateAddress
{
    public static function run($request, $id){
        DB::beginTransaction();
        // dd($request);
        $address = Address::findOrFail($id);
        // dd($address);
        $address->shipping_fname  = $request['shipping_fname'] ?? $address->shipping_fname;
        $address->shipping_lname =  $request['shipping_lname'] ?? $address->shipping_lname;
        $address->shipping_address =  $request['shipping_street_address '] ?? $address->shipping_address;
        $address->shipping_landmark = $request['shipping_landmark'] ?? $address->shipping_landmark;
        $address->shipping_city = $request['shipping_city'] ?? $address->shipping_city;
        $address->shipping_state = $request['shipping_state'] ?? $address->shipping_state;
        $address->shipping_zipcode = $request['shipping_postcode'] ?? $address->shipping_zipcode;
        $address->shipping_phone = $request['shipping_phone_number'] ?? $address->shipping_phone;
        $address->update();
        DB::commit();

        return true;
    }

}
?>
