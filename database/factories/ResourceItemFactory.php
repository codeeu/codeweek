<?php

use Faker\Generator as Faker;

$factory->define(App\ResourceItem::class, function (Faker $faker) {
    return [
        'label' => $faker->text(40),
        'description' => $faker->text(400),
        'source' => $faker->url()
    ];
});
