<?php

use Faker\Generator as Faker;

$factory->define(App\Country::class, function (Faker $faker, $country) {

    return [
        'iso' => $country["iso"] ?? $faker->countryCode,
        'name' => $country["name"] ?? $faker->country,
        'parent' => '',
        'population' => $faker->numberBetween(1000,100000),
        'continent' => 'EU',
        'facebook' => $faker->url,
        'website' => $faker->url,
        'longitude' => $faker->longitude(10,40),
        'latitude' => $faker->latitude(20,60)
    ];
});







