<?php

namespace Database\Factories;

use App\Models\Lawyer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => User::inRandomOrder()->first()->id,
            "lawyer_id" => Lawyer::inRandomOrder()->first()->id,
            "rating" => fake()->randomElement([1,2,3,4,5]),
            "message" => fake()->paragraph()
        ];
    }
}
