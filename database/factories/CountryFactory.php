<?php

use Faker\Generator as Faker;

$factory->define(App\Country::class, function (Faker $faker, $country) {

    return [
        'iso' => $country["iso"] ?? $faker->countryCode,
        'name' => $country["name"] ?? $faker->country,
        'continent' => 'EU',
        'facebook' => $faker->url,
        'website' => $faker->url,
    ];
});







