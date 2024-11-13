<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\LeadingTeacherExpertise::class, function () {
    return [
        'name' => $this->faker->text(40),
        'position' => $this->faker->numberBetween(1, 20),
    ];
});
