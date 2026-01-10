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


    }
}
