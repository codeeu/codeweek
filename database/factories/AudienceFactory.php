<?php

use Faker\Generator as Faker;

$factory->define(App\Audience::class, function (Faker $faker) {
    return [
        'name' => $faker->slug(2),
    ];
});
