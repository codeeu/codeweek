<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->slug(2),
        'slug' => $faker->slug(2)
    ];
});
