<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'holder_name' => fake()->name(),
            'card_number' => fake()->numerify("####-####-####-####"),
            'expiry_date' => fake()->creditCardExpirationDate()->format('m/y'),
            'cvv' => fake()->numberBetween(100, 999),
        ];
    }
}
