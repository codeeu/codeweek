<?php

use App\Country;
use Faker\Generator as Faker;

$factory->define(App\School::class, function (Faker $faker) {
    $countries = Country::all()->pluck('iso')->toArray();

    return [
        'name' => $faker->company,
        'description' => $faker->text(200),
        'geoposition' => $faker->longitude . ',' . $faker->latitude,
        'location' => $faker->address,
        'country' => $faker->randomElement($countries),

    ];
});
