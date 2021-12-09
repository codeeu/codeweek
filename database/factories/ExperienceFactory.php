<?php

use App\Experience;
use Faker\Generator as Faker;

$factory->define(App\Experience::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory(App\User::class)->create()->id;
        },
        'points' => 0,
        'edition' => $faker->numberBetween(2018,2021)
    ];
});