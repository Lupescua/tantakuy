<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'social_links' => json_encode([
                'facebook' => 'https://facebook.com/admin',
                'google' => 'https://google.com/admin',
            ]),
            'location' => 'Aarhus, Denmark',
            'description' => 'Administrator account',
            'profile_photo_path' => null,
            'remember_token' => Str::random(10),
        ]);

        // Generate 10 test users
        
        User::factory(10)->withPersonalTeam()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
