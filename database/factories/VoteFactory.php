<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Vote;

$factory->define(Vote::class, function () {
    return [
        'country' => $this->faker->country(),
        'choice' => $this->faker->sentence(),
        'session' => $this->faker->uuid(),
    ];
});
