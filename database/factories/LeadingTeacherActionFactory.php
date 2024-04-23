<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\LeadingTeacherAction::class, function (Faker $faker) {
    return [
        'title' => $faker->text(40),
        'type' => $faker->word,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
