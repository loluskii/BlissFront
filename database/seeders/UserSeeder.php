<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fname' => 'Don',
            'lname' => 'Bills',
            'email' => 'enterprise@enterprise',
            'address' => 'address',
            'city' => 'city',
            'state' => 'state',
            'email' => 'sirdaw1@yahoo.com',
            'email_verified_at' => now(),
            'is_admin' => 1,
            'password' => Hash::make('blissrouter'), // bllissrouter
            'remember_token' => Str::random(10),
        ]);
    }
}
