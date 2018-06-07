<?php

use Faker\Generator as Faker;

$factory->define(App\Country::class, function (Faker $faker, $country) {

    return [
        'iso' => $country["iso"],
        'name' => $country["name"],
        'continent' => 'EU',
        'facebook' => $faker->url,
        'website' => $faker->url,
    ];
});







