<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Vote;
use Faker\Generator as Faker;

$factory->define(Vote::class, function () {
    return [
        'country' => $this->faker->country(),
        'choice' => $this->faker->sentence(),
        'session' => $this->faker->uuid(),
    ];
});
