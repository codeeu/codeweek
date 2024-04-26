<?php

$factory->define(App\Experience::class, function () {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'points' => 0,
        'edition' => $this->faker->numberBetween(2018, 2021),
    ];
});
