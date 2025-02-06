<?php

namespace Database\Factories;

use App\Models\UserSubmission;
use App\Models\User;
use App\Models\Competition;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSubmissionFactory extends Factory
{
    protected $model = UserSubmission::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'competition_id' => Competition::factory(),
            'title' => fake()->sentence(),
            'images' => json_encode([fake()->imageUrl(), fake()->imageUrl()]), // Random images
            'meta_description' => fake()->sentence(),
        ];
    }
}
