<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubmissionVote;
use App\Models\User;
use App\Models\UserSubmission;

class SubmissionVoteSeeder extends Seeder
{
    public function run(): void
    {
        UserSubmission::all()->each(function ($submission) {
            SubmissionVote::factory(5)->create(['submission_id' => $submission->id]);
        });
    }
}
