<?php

namespace Database\Factories; /* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\PodcastGuest;
use Faker\Generator as Faker;

$factory->define(PodcastGuest::class, function (Faker $faker) {
    return [
        'podcast_id' => function () {
            return factory('App\Podcast')->create()->id;
        },
        'image_path' => $faker->url(),
        'position' => $faker->numberBetween(1,1000),
        'name' => $faker->name,
        'description' => $faker->text,
    ];
});
