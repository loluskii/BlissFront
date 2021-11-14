<?php

namespace App\Services\Plans;

use DB;
use Exception;
use App\Models\Plans;
use App\Models\PlanSubscription;
use Illuminate\Support\Facades\Auth;


class PlanQueries{

    public function findById($id){
        return Plans::find($id);
    }

    public function getUserSubscriptionDetails(){
        return Auth::user()->subscriptions;
    }

}

?>
