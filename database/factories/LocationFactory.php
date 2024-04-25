<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'geoposition' => $this->faker->randomFloat().','.$this->faker->randomFloat(),
            'trimmed_geoposition' => $this->faker->randomFloat().','.$this->faker->randomFloat(),
            'latitude' => $this->faker->randomFloat(),
            'longitude' => $this->faker->randomFloat(),
            'location' => $this->faker->address(),
            'country_iso' => $this->faker->randomElement(['BE', 'FR', 'DE', 'NL']),
            'is_default' => $this->faker->boolean(),
            'is_primary' => $this->faker->boolean(),
            'user_id' => function () {
                return  \App\User::factory()->create()->id;
            },
            'event_id' => function () {
                return  \App\Event::factory()->create()->id;
            },

        ];
    }
}