<?php

namespace Database\Factories;

use App\Models\Competition;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionFactory extends Factory
{
    protected $model = Competition::class;

    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'prize' => fake()->word(),
            'start_date' => now(),
            'end_date' => now()->addDays(10),
            'status' => 'Opened',
        ];
    }
}
