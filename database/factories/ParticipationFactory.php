<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipationFactory extends Factory
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
            'names' => $this->faker->firstName(),
            'event_name' => $this->faker->name(),
            'event_date' => $this->faker->name(),
            'participation_url' => $this->faker->url(),

        ];
    }
}