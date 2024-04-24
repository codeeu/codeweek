<?php

use Faker\Generator as Faker;

$factory->define(App\ResourceItem::class, function () {
    return [
        'name' => $this->faker->text(40),
        'description' => $this->faker->text(400),
        'source' => $this->faker->url(),
    ];
});
