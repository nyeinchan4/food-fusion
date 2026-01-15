<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::firstOrCreate([
            'first_name' => 'Admin',
            'last_name'     => 'User',
            'email'      => 'admin@gmail.com',
            'password'   => Hash::make('@dminPassword'),
            'is_verified'=> true,
            'is_admin' => true,
        ]);

        User::firstOrCreate([
            'first_name' => 'Test',
            'last_name'     => 'User',
            'email'      => 'test@gmail.com',
            'password'   => Hash::make('password'),
            'is_verified'=> false,
            'is_admin' => false,
        ]);

        User::firstOrCreate([
            'first_name' => 'Sarah',
            'last_name'     => 'Chen',
            'email'      => 'sarah.chen@gmail.com',
            'password'   => Hash::make('password'),
            'is_verified'=> true,
            'is_admin' => false,
        ]);

        User::firstOrCreate([
            'first_name' => 'Michael',
            'last_name'     => 'Johnson',
            'email'      => 'michael.j@gmail.com',
            'password'   => Hash::make('password'),
            'is_verified'=> true,
            'is_admin' => false,
        ]);

        User::firstOrCreate([
            'first_name' => 'Emma',
            'last_name'     => 'Wilson',
            'email'      => 'emma.wilson@gmail.com',
            'password'   => Hash::make('password'),
            'is_verified'=> false,
            'is_admin' => false,
        ]);

        User::firstOrCreate([
            'first_name' => 'David',
            'last_name'     => 'Kumar',
            'email'      => 'david.kumar@gmail.com',
            'password'   => Hash::make('password'),
            'is_verified'=> true,
            'is_admin' => false,
        ]);

    }
}
