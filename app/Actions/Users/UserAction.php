<?php
namespace App\Actions\Users;

use Exception;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAction
{
    public static function Charts(){
        $date = Carbon::now();
        // $order = Order::whereDate('created_at', '>=', $date->copy()->startOfMonth())->whereDate('created_at', '<=', $date->copy()->endOfMonth())->get();
        // dd($date->copy()->startOfMonth(),$date->copy()->endOfMonth(),$order->sum('subtotal'));
        $currentmonth = Order::where([['status','pending'], ['is_paid', 1]])->whereDate('created_at', '>=', $date->copy()->startOfMonth())->whereDate('created_at', '<=', $date->copy()->endOfMonth())->get();
        $lastmonth = Order::where([['status','pending'], ['is_paid', 1]])->whereDate('created_at', '>=', $date->copy()->startOfMonth()->subMonth())->whereDate('created_at', '<=', $date->copy()->endOfMonth()->subMonth())->get();
        $anothermonth = Order::where([['status','pending'], ['is_paid',  1]])->whereDate('created_at', '>=', $date->copy()->startOfMonth()->subMonths(2))->whereDate('created_at', '<=', $date->copy()->endOfMonth()->subMonths(2))->get();
        $anothermonth2 = Order::where([['status','pending'], ['is_paid',  1]])->whereDate('created_at', '>=', $date->copy()->startOfMonth()->subMonths(3))->whereDate('created_at', '<=', $date->copy()->endOfMonth()->subMonths(3))->get();
        $anothermonth3 = Order::where([['status','pending'], ['is_paid',  1]])->whereDate('created_at', '>=', $date->copy()->startOfMonth()->subMonths(4))->whereDate('created_at', '<=', $date->copy()->endOfMonth()->subMonths(4))->get();

        // dd($currentmonth->sum('subtotal'));
        $data = [
            ['year' => $date->year . '-' . $date->copy()->startOfMonth()->subMonths(4)->format('m'), 'value' => $anothermonth3->sum('subtotal')],
            ['year' => $date->year . '-' . $date->copy()->startOfMonth()->subMonths(3)->format('m'), 'value' => $anothermonth2->sum('subtotal')],
            ['year' => $date->year . '-' . $date->copy()->startOfMonth()->subMonths(2)->format('m'), 'value' => $anothermonth->sum('subtotal')],
            ['year' => $date->year . '-' . $date->copy()->startOfMonth()->subMonth()->format('m'), 'value' => $lastmonth->sum('subtotal')],
            ['year' => $date->year . '-' . $date->copy()->format('m'), 'value' => $currentmonth->sum('subtotal')],
        ];

        return json_encode($data);
    }

}
?>
