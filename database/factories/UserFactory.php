<?php

use App\Country;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {

    $countries = Country::all()->pluck('iso')->toArray();
    if (empty($countries)) {
        $countries[0] = factory('App\Country')->create()->iso;
    }

    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->firstName,
        'username' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'country_iso' => $faker->randomElement($countries),
        'twitter' => $faker->userName,
        'website' => $faker->url,
        'bio' => $faker->text,
        'avatar_path' => 'avatars/default.png',
        'provider' => $faker->randomElement(['facebook', 'google', 'github']),
        'privacy' => true,
        'receive_emails' => true,
        'magic_key' => $faker->randomNumber(6),

    ];
});
