<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Vote;
use Faker\Generator as Faker;

$factory->define(Vote::class, function (Faker $faker) {
    return [
        'country' => $faker->country(),
        'choice' => $faker->sentence(),
        'session' => $faker->uuid(),
    ];
});
