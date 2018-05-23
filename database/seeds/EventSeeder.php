<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        create('App\Event',[
            'status' => 'APPROVED',
            'title' => 'Boitsfort Coding',
            'geoposition' => '50.8093378,4.4088449',
            'latitude' => 50.8093378,
            'longitude' => 4.4088449,
            'start_date' => Carbon::yesterday(),
            'end_date' => Carbon::now()->addYear(),

        ]);

        create('App\Event',[
            'status' => 'APPROVED',
            'title' => 'Eiffel',
            'geoposition' => '48.85589859999999,2.298087500000065',
            'latitude' => 48.855899,
            'longitude' => 2.298088,
            'start_date' => Carbon::yesterday(),
            'end_date' => Carbon::now()->addYear(),
            'picture' => 'https://s3-eu-west-1.amazonaws.com/codeweek-dev/events/pictures/497404905/800px-Tour_Eiffel_Wikimedia_Commons_(cropped).jpg',
            'country_iso' => 'FR'
        ]);

        create('App\Event',[
            'status' => 'APPROVED',
            'title' => 'Arc de Triomphe',
            'geoposition' => '48.8737793,2.2950155999999424',
            'latitude' => 48.873780,
            'longitude' => 2.298088,
            'start_date' => Carbon::yesterday(),
            'end_date' => Carbon::now()->addYear(),
            'picture' => 'https://s3-eu-west-1.amazonaws.com/codeweek-dev/events/pictures/599934974/Arc-De-Triomphe-at-Sunset-Presetpro-1024x683.jpg',
            'country_iso' => 'FR'

        ]);

        factory(App\Event::class, 100)->create();
    }
}
