<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompetitionLink;
use App\Models\Competition;

class CompetitionLinkSeeder extends Seeder
{
    public function run(): void
    {
        Competition::all()->each(function ($competition) {
            CompetitionLink::factory(3)->create(['competition_id' => $competition->id]);
        });
    }
}
