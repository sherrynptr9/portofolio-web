<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Sherrynita',
            'email' => 'admin@gmail.com', // Ini email untuk login
            'password' => Hash::make('password123') // Ini password untuk login
        ]);
    }
}