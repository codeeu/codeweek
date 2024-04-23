<?php

use App\Achievements\Achievement;
use Faker\Generator as Faker;

$factory->define(Achievement::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'icon' => 'foo.svg',
        'edition' => $faker->year,
    ];
});
