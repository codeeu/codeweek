<?php

use App\Country;
use Faker\Generator as Faker;

$factory->define(App\School::class, function () {
    $countries = Country::all()->pluck('iso')->toArray();

    return [
        'name' => $this->faker->company(),
        'description' => $this->faker->text(200),
        'geoposition' => $this->faker->longitude().','.$this->faker->latitude(),
        'location' => $this->faker->address(),
        'country' => $this->faker->randomElement($countries),

    ];
});
