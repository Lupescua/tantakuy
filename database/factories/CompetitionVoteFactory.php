<?php

namespace Database\Factories;

use App\Models\CompetitionVote;
use App\Models\Competition;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionVoteFactory extends Factory
{
    protected $model = CompetitionVote::class;

    public function definition(): array
    {
        return [
            'competition_id' => Competition::factory(),
            'user_id' => User::factory(),
        ];
    }
}
