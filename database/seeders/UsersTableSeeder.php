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
                'id'                  => 1,
                'name'                => 'Admin',
                'email'               => 'admin@admin.com',
                'password'            => bcrypt('password'),
                'remember_token'      => null,
                'verified'            => 1,
                'verified_at'         => '2020-12-08 22:40:42',
                'phone'               => '',
                'about'               => '',
                'address'             => '',
                'gps_location'        => '',
                'verification_token'  => '',
                'language'            => '',
                'rank'                => '',
                'username'            => '',
                'nationality'         => '',
                'passport_number'     => '',
                'bank_name'           => '',
                'bank_account_number' => '',
                'beneficial_name'     => '',
            ],
        ];

        User::insert($users);
    }
}
