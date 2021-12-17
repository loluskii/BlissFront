<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    public function blockedUsers(){
        $users = User::where('active',0);
        return view('admin.users.blocked')->with('users', $users);
    }
}
