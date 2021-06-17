<?php

use Faker\Generator as Faker;

$factory->define(App\Excellence::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'edition' => $faker->numberBetween(2018,2020)
    ];
});