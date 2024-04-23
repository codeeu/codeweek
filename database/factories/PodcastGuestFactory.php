<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\PodcastResource>
 */
class PodcastGuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'podcast_id' => function () {
                return factory(\App\Podcast::class)->create()->id;
            },
            'image_path' => $this->faker->url(),
            'position' => $this->faker->numberBetween(1, 1000),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
        ];
    }
}
