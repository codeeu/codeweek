<?php

namespace Database\Factories; /* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Podcast;
use Faker\Generator as Faker;

$factory->define(Podcast::class, function () {
    return [
        'title' => $this->faker->sentence(5),
        'filename' => $this->faker->word(),
        'image' => $this->faker->word(),
        'transcript' => $this->faker->word(),
        'release_date' => $this->faker->dateTime(),
        'description' => $this->faker->text(300),
    ];
});
