<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\LeadingTeacherAction::class, function () {
    return [
        'title' => $this->faker->text(40),
        'type' => $this->faker->word(),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
