<?php

namespace Database\Factories;

use App\Country;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = Carbon::createFromDate($this->faker->dateTimeBetween($start = '-1week', $end = 'now'));
        $end_date = Carbon::createFromDate($this->faker->dateTimeBetween($start = 'now', $end = '+1week'));

        $countries = Country::all()->pluck('iso')->toArray();
        $orgtypes = ['school', 'library', 'nonprofit', 'other'];
        if (empty($countries)) {
            $countries[0] = Country::factory()->create()->iso;
        }

        $latitude = $this->faker->latitude(42, 59);
        $longitude = $this->faker->longitude(10, 20);

        return [
            'status' => $this->faker->randomElement(['APPROVED', 'PENDING', 'REJECTED']),
            'title' => $this->faker->text(40),
            'slug' => $this->faker->slug(2),
            'organizer' => $this->faker->company(),
            'description' => $this->faker->text(),
            'geoposition' => $latitude.','.$longitude,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'location' => $this->faker->address(),
            'country_iso' => $this->faker->randomElement($countries),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'event_url' => $this->faker->url(),
            'contact_person' => $this->faker->email(),
            'user_email' => $this->faker->email(),
            'pub_date' => Carbon::createFromDate($this->faker->dateTime()),
            'created' => Carbon::createFromDate($this->faker->dateTime()),
            'updated' => Carbon::createFromDate($this->faker->dateTime()),
            'creator_id' => function () {
                return User::factory()->create()->id;
            },
            'report_notifications_count' => 0,
            'name_for_certificate' => $this->faker->name(),
            'organizer_type' => $this->faker->randomElement($orgtypes),
            'participants_count' => $this->faker->numberBetween(0, 100),
            'codeweek_for_all_participation_code' => $this->faker->randomAscii(),
            'activity_type' => 'offline',
            'language' => 'en',
            'highlighted_status' => 'NONE',

        ];
    }
}
