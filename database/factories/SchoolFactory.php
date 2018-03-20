<?php

use Faker\Generator as Faker;

$factory->define(App\School::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text(200),
        'geoposition' => $faker->longitude . ',' . $faker->latitude,
        'location' => $faker->address,
        'country' => $faker->countryCode

    ];
});
