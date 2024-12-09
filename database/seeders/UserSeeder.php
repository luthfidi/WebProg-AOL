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
            'name' => 'Librarian Admin',
            'email' => 'admin@library.com',
            'password' => Hash::make('password123')
        ]);

        User::create([
            'name' => 'Assistant Librarian',
            'email' => 'assistant@library.com', 
            'password' => Hash::make('password123')
        ]);
    }
}