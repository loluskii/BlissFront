<?php

namespace App\Actions\Users;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use DB;

class ChangePassword
{
    public function run($request)
    {
        if (Auth::user()->password != '') {
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
            ]);
        }
        //else {
        //     $request->validate([
        //         'new_password' => ['required'],
        //         'new_confirm_password' => ['same:new_password'],
        //     ]);
        // }
        DB::beginTransaction();
        User::find(Auth::id())->update(['password' => Hash::make($request->new_password)]);
        DB::commit();

        return true;
    }
}
