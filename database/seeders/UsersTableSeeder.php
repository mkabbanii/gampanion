<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                  => 'ssM1ViqoX5c2ShRSUZJVKfqujo92',
                'name'                => 'Admin',
                'email'               => 'admin@admin.com',
                'password'            => bcrypt('password'),
                'remember_token'      => null,
                'verified'            => 1,
                'verified_at'         => '2020-12-08 23:21:23',
                'phone'               => '',
                'about'               => '',
                'address'             => '',
                'gps_location'        => '',
                'verification_token'  => '',
                'language'            => '',
                'rank'                => '',
                'nationality'         => '',
                'passport_number'     => '',
                'bank_name'           => '',
                'bank_account_number' => '',
                'beneficial_name'     => '',
                'full_name'           => '',
            ],
        ];

        User::insert($users);
    }
}
