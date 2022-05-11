<?php

namespace Database\Factories; /* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Country;
use App\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {


    return [
        'geoposition' => $faker->randomFloat() . ',' . $faker->randomFloat(),
        'trimmed_geoposition' => $faker->text(10),
        'latitude' => $faker->randomFloat(),
        'longitude' => $faker->randomFloat(),
        'location' => $faker->address,
        'country_iso' => $faker->randomElement(['BE','FR','DE','NL']),
        'is_default' => $faker->boolean,
        'is_primary' => $faker->boolean,
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'event_id' => function () {
            return factory('App\Event')->create()->id;
        },

    ];
});