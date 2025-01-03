<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lawyer>
 */
class LawyerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_link' => $this->faker->imageUrl(),
            'name' => $this->faker->name(),
            'biography' => $this->faker->paragraph(),
            'city_id' => City::inRandomOrder()->first()->id,
            'experience_years' => $this->faker->numberBetween(1, 40),
            'hour_price' => $this->faker->numberBetween(50, 500)
        ];
    }
}
