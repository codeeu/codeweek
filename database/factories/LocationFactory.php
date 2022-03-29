<?php

namespace Database\Factories; /* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Country;
use App\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {


    return [
        'latitude' => $faker->latitude(42,59),
        'longitude' => $faker->longitude(1,20),
        'location' => $faker->address,
        'country_iso' => $faker->randomElement(['BE','FR','DE','NL']),
        'is_default' => $faker->boolean,
        'is_favorite' => $faker->boolean,
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'event_id' => function () {
            return factory('App\Event')->create()->id;
        },

    ];
});