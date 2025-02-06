<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompetitionVote;
use App\Models\Competition;
use App\Models\User;

class CompetitionVoteSeeder extends Seeder
{
    public function run(): void
    {
        Competition::all()->each(function ($competition) {
            $users = User::inRandomOrder()->take(5)->pluck('id');
            foreach ($users as $userId) {
                CompetitionVote::factory()->create([
                    'competition_id' => $competition->id,
                    'user_id' => $userId,
                ]);
            }
        });
    }
}
