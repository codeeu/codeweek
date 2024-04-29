<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\City::class, function () {
    return [
        'id' => $this->faker->numberBetween(1234567890, 9999999999),
        'city' => $this->faker->city(),
        'country' => $this->faker->country(),
        'country_iso' => $this->faker->countryCode(),
        'longitude' => $this->faker->longitude(),
        'latitude' => $this->faker->latitude(),
    ];
});
