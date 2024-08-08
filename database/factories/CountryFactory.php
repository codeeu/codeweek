<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'iso' => $country['iso'] ?? $this->faker->countryCode(),
            'name' => $country['name'] ?? $this->faker->country(),
            'parent' => '',
            'population' => $this->faker->numberBetween(1000, 100000),
            'continent' => 'EU',
            'facebook' => $this->faker->url(),
            'website' => $this->faker->url(),
            'longitude' => $this->faker->longitude(10, 40),
            'latitude' => $this->faker->latitude(20, 60),
        ];
    }
}
