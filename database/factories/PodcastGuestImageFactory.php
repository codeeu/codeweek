<?php

namespace Database\Factories; /* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\PodcastGuestImage;
use Faker\Generator as Faker;

$factory->define(PodcastGuestImage::class, function (Faker $faker) {
    return [
        'podcast_id' => function () {
            return factory('App\Podcast')->create()->id;
        },
        'path' => $faker->url()
    ];
});
