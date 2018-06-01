<?php

use Faker\Generator as Faker;

$factory->define(App\Volunteer::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory('App\User')->create()->id;
        }
    ];
});
