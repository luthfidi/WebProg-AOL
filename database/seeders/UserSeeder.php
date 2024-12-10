<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 0
        ]);

        User::create([
            'name' => 'Librarian',
            'email' => 'librarian@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 1
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com', 
            'password' => Hash::make('password123'),
            'role' => 2
        ]);
    }
}