<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Moderation;

$factory->define(Moderation::class, function () {
    return [
        'event_id' => function () {
            return factory(App\Event::class)->create()->id;
        },
        'message' => $this->faker->text(),
        'status_by' => function () {
            return factory(App\User::class)->create()->id;
        },

    ];
});
