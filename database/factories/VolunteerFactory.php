<?php

use Faker\Generator as Faker;

$factory->define(App\Volunteer::class, function () {
    return [
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
    ];
});
