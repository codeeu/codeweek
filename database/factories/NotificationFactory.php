<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notification;
use Faker\Generator as Faker;

$factory->define(Notification::class, function () {
    return [
        'event_id' => function () {
            return  \App\Event::factory()->create()->id;
        },
    ];
});
