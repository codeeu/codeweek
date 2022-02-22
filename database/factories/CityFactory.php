<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\City::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween(1234567890, 9999999999),
        'city' => $faker->city,
        'country' => $faker->country,
        'country_iso' => $faker->countryCode,
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
        'dt' => $faker->dateTime,
    ];
});


