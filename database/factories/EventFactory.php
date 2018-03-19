<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    static $password;

    return [
        'status' => $faker->name,
        'title' => $faker->text(40),
        'slug' => $faker->slug(2),
        'organizer' => $faker->company,
        'description' => $faker->text,
        'geoposition' => $faker->longitude . ',' . $faker->latitude,
        'location' => $faker->address,
        'country' => $faker->countryCode,
        'start_date' => $faker->dateTime,
        'end_date' => $faker->dateTime,
        'event_url' => $faker->url,
        'contact_person' => $faker->email,
        'picture' => $faker->text(100),
        'pub_date' => $faker->dateTime,
        'created' => $faker->dateTime,
        'updated' => $faker->dateTime,
        'creator_id' => function () {
            return factory('App\User')->create()->id;
        },
        'report_notifications_count' => 0,
        'name_for_certificate' => $faker->name
    ];
});
