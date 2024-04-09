<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mr Admin',
            'gender' => '1',
            'phone_number' => '017366739332',
            'status' => '1',
            'email' => 'admin@gmail.com',
            'user_type' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('4'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'MR User',
            'gender' => '1',
            'phone_number' => '9366378443',
            'status' => '1',
            'email' => 'user@gmail.com',
            'user_type' => 'user',
            'password' => Hash::make('4'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
