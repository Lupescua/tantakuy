<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'description' => fake()->paragraph(),
            'cvr' => fake()->unique()->numerify('########'),
            'address' => fake()->address(),
            'logo_path' => fake()->imageUrl(200, 200, 'business'),
            'cover_photo_path' => fake()->imageUrl(1200, 300, 'business'),
            'subscription_level' => fake()->randomElement(['free', 'plus', 'premium']),
        ];
    }
}
