<?php

namespace Database\Factories;

use App\Models\CompetitionLink;
use App\Models\Competition;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionLinkFactory extends Factory
{
    protected $model = CompetitionLink::class;

    public function definition(): array
    {
        return [
            'competition_id' => Competition::factory(),
            'url' => fake()->url(),
            'description' => fake()->sentence(),
            'meta_description' => fake()->sentence(),
            'display_type' => fake()->randomElement(['description', 'meta_description']),
        ];
    }
}
