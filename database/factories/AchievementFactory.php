<?php

use App\Achievements\Achievement;

$factory->define(Achievement::class, function () {
    return [
        'name' => $this->faker->word(),
        'description' => $this->faker->sentence(),
        'icon' => 'foo.svg',
        'edition' => $this->faker->year(),
    ];
});
