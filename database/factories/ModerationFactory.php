<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Moderation;
use Faker\Generator as Faker;

$factory->define(Moderation::class, function (Faker $faker) {
    return [
        'event_id' => function () {
            return factory(App\Event::class)->create()->id;
        },
        'message' => $faker->text,
        'status_by' => function () {
            return factory(App\User::class)->create()->id;
        },

    ];
});
