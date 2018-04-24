<?php

use Faker\Generator as Faker;

$factory->define(App\Country::class, function (Faker $faker) {

    return [
        'iso' => $faker->countryCode,
        'name' => $faker->country,
        'continent' => 'EU',
        'facebook' => $faker->url
    ];
});
