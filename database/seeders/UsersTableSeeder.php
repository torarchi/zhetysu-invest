<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'Admin1',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => Hash::make('user1password'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'password' => Hash::make('user2password'),
            'role_id' => 1,
        ]);

    }
}
