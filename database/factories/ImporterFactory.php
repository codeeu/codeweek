<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImporterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'original_id' => $this->faker->numberBetween(10, 1000),
            'website' => $this->faker->safeEmailDomain(),
            'event_id' => $this->faker->randomNumber(),
            'original_updated_at' => $this->faker->dateTime(),
            'seen_at' => $this->faker->dateTime(),
            'status' => 'ADDED',
        ];
    }
}