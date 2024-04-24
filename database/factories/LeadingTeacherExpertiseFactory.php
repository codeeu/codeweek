<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\LeadingTeacherExpertise::class, function () {
    return [
        'name' => $this->faker->text(40),
        'position' => $this->faker->numberBetween(1, 20),
    ];
});
