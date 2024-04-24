<?php

use Faker\Generator as Faker;

$factory->define(App\Excellence::class, function () {
    return [
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
        'edition' => $this->faker->numberBetween(2018, 2021),
    ];
});
