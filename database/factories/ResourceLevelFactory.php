<?php

$factory->define(App\ResourceLevel::class, function () {
    return [
        'name' => $this->faker->text(40),
        'position' => $this->faker->numberBetween(1, 20),

    ];
});
