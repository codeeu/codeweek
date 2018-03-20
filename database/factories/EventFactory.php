<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    static $password;

    $event_date = $faker->dateTimeBetween($start='-1month',$end='+1month');

    return [
        'status' => $faker->name,
        'title' => $faker->text(40),
        'slug' => $faker->slug(2),
        'organizer' => $faker->company,
        'description' => $faker->text,
        'geoposition' => $faker->longitude . ',' . $faker->latitude,
        'location' => $faker->address,
        'country' => $faker->countryCode,
        'start_date' => $event_date,
        'end_date' => $event_date,
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
