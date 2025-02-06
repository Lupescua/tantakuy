<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Competition;
use App\Models\User;

class CompetitionSeeder extends Seeder
{
    public function run(): void
    {
        // Pluck Users
        $users = User::inRandomOrder()->take(5)->get();

        // Pluck Companies
        $companies = Company::inRandomOrder()->take(5)->get();

        // Seed Competitions
        $companies->each(function ($company) use ($users) {
            $competition = Competition::factory()->create(['company_id' => $company->id]);

            // Attach random users as participants
            $competition->participants()->attach($users->random(3)->pluck('id'));
        });
    }
}
