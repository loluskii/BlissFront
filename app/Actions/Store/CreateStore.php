<?php

namespace App\Actions\Store;

use App\Models\Store;

Class CreateStore{
    public static function run($request){
        $store = new Store;
        $store->name = $request->name;
        $store->city = $request->city;
        $store->state = $request->state;
        $store->save();

        return true;
    }

}
?>
