<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VolunteerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return \App\User::factory()->create()->id;
            },
        ];
    }
}
