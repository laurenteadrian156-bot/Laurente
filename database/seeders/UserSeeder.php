<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Manager Users
        User::create([
            'name' => 'Manager Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'manager',
        ]);

        User::create([
            'name' => 'John Manager',
            'email' => 'john.manager@dormitory.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);


       
    }
}