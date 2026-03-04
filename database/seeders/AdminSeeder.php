<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Unique identifier
            [
                'name' => 'System Admin',
                'password' => Hash::make('password123'), // Change this!
                'role' => 'admin', // This matches your previous migration
                'email_verified_at' => now(),
            ]
        );
    }
}
