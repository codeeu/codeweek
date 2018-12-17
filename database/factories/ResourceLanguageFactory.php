<?php

use Faker\Generator as Faker;

$factory->define(App\ResourceLanguage::class, function (Faker $faker) {
    return [
        'name' => $faker->text(40),
        'position' => $faker->numberBetween(1,20)
    ];
});
