<?php

use Faker\Generator as Faker;

$factory->define(App\Theme::class, function (Faker $faker) {
    return [
        'name' => $faker->slug(2),
        'order' => $faker->numberBetween(1,20)
    ];
});
