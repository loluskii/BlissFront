<?php
namespace App\Actions\Users;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateUser
{
    public static function run($request){
        DB::beginTransaction();
        $user = User::find(Auth::id());
        $user->fname = $request['fname'] ?? $user->fname;
        $user->lname = $request['lname'] ?? $user->lname;
        $user->email = $request['email'] ?? $user->email;
        $user->phone_number =  $request['phone_no'] ?? $user->phone_number;
        $user->password = $user->password;
        $user->update();
        DB::commit();
    }

}
?>
