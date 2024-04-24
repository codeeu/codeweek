<?php

namespace Database\Factories; /* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function () {

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
            return factory(\App\User::class)->create()->id;
        },
        'event_id' => function () {
            return factory(\App\Event::class)->create()->id;
        },

    ];
});
