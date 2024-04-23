<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Participation;
use Faker\Generator as Faker;

$factory->define(Participation::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'names' => $faker->firstName,
        'event_name' => $faker->name(),
        'event_date' => $faker->name(),
        'participation_url' => $faker->url,

    ];
});
