<?php

use Faker\Generator as Faker;

$factory->define(App\ResourceLanguage::class, function () {
    return [
        'name' => $this->faker->text(40),
        'position' => $this->faker->numberBetween(1, 20),
    ];
});
