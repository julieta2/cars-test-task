<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $users = [
            [
                'name' => 'Regular User',
                'email' => 'regular@gmail.com',
                'password' => app('hash')->make('123456'),
                'email_verified_at' => $now,
                'is_admin' => false,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => app('hash')->make('123456'),
                'email_verified_at' => $now,
                'is_admin' => true,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];

        User::insert($users);
    }
}
