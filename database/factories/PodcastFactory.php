<?php

namespace Database\Factories; /* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Podcast;
use Faker\Generator as Faker;

$factory->define(Podcast::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'filename' => $faker->word,
        'image' => $faker->word,
        'release_date' => $faker->dateTime,
        'description' => $faker->text(300)
    ];
});
