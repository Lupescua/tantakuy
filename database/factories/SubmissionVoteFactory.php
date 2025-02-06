<?php

namespace Database\Factories;

use App\Models\SubmissionVote;
use App\Models\User;
use App\Models\UserSubmission;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionVoteFactory extends Factory
{
    protected $model = SubmissionVote::class;

    public function definition(): array
    {
        return [
            'submission_id' => UserSubmission::factory(),
            'user_id' => User::factory(),
        ];
    }
}
