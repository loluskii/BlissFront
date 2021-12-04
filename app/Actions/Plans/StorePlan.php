<?php
namespace App\Actions\Plans;

use Exception;
use App\Models\Plans;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StorePlan
{
    public static function run($request){
        $plan = new Plans;
        $plan->name = $request->name;
        $plan->description = $request->desc;
        $plan->interval = $request->interval_type;
        $plan->interval_count = $request->count;
        $plan->delivery_fee = $request->delivery_fee;
        $plan->slug = $request->slug;
        $plan->save();

        return true;

    }

}
?>
