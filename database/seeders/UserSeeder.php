<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'nataliefariz69@gmail.com'],
            [
                'name' => 'Ahmad Farid',
                'email' => 'nataliefariz69@gmail.com',
                'password' => Hash::make('!FarizAhmad123456'),
                'email_verified_at' => now(),
            ]
        );
    }
}
