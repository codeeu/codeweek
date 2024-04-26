<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AudienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->slug(2),
        ];
    }
}
