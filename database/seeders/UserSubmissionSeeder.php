<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserSubmission;
use App\Models\User;
use App\Models\Competition;

class UserSubmissionSeeder extends Seeder
{
    public function run(): void
    {
        Competition::all()->each(function ($competition) {
            UserSubmission::factory(3)->create(['competition_id' => $competition->id]);
        });
    }
}
