<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventsAPITest extends TestCase {
    use DatabaseMigrations;

    /** @test */
    public function it_should_return_events_in_hamburg() {
        create(
            'App\Event',
            [
                'longitude' => 46.60675,
                'latitude' => 13.84246
            ],
            3
        );

        $badLatitudeEvent = create('App\Event', [
            'longitude' => 9.87985,
            'latitude' => 55.5311
        ]);

        $badLongitudeEvent = create('App\Event', [
            'longitude' => 19.87985,
            'latitude' => 53.5311
        ]);

        $hamburgEvent = create('App\Event', [
            'title' => 'Good Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311
        ]);

        $response = $this->json(
            'GET',
            '/api/events/geobox?lat1=53.718861&long1=9.733149&lat2=53.409484&long2=10.339855'
        );

        // /api/events/geobox?lat1=53.718861&long1=9.733149&lat2=53.409484&long2=10.339855
        //53.718861
        //9.733149

        //53.409484
        //10.339855

        $data = $response->decodeResponseJson()['data'];

        $this->assertCount(1, $data);
        $this->assertEquals('Good Event', $data[0]['title']);
    }

    /** @test */
    public function it_should_return_events_geolocalized_for_specific_year() {
        create(
            'App\Event',
            [
                'longitude' => 46.60675,
                'latitude' => 13.84246
            ],
            3
        );

        $badLatitudeEvent = create('App\Event', [
            'longitude' => 9.87985,
            'latitude' => 55.5311
        ]);

        $badLongitudeEvent = create('App\Event', [
            'longitude' => 19.87985,
            'latitude' => 53.5311
        ]);

        $pastEvent = create('App\Event', [
            'title' => '2020 Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'end_date' => Carbon::now()->setYear(2020)
        ]);

        $goodEvent = create('App\Event', [
            'title' => '2021 Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'end_date' => Carbon::now()->setYear(2021)
        ]);

        $response = $this->json(
            'GET',
            '/api/events/geobox?lat1=53&long1=9&lat2=54&long2=10&year=2020'
        );

        $data = $response->decodeResponseJson()['data'];

        $this->assertCount(1, $data);
        $this->assertEquals('2020 Event', $data[0]['title']);
    }

    /** @test */
    public function it_should_return_events_geolocalized_for_current_year_by_default() {
        $pastEvent = create('App\Event', [
            'title' => '2020 Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'end_date' => Carbon::now()->setYear(2020)
        ]);

        $currentYearEvent = create('App\Event', [
            'title' => 'Current Year Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'end_date' => Carbon::now()
        ]);

        $response = $this->json(
            'GET',
            '/api/events/geobox?lat1=53&long1=9&lat2=54&long2=10'
        );

        $data = $response->decodeResponseJson()['data'];

        $this->assertCount(1, $data);
        $this->assertEquals('Current Year Event', $data[0]['title']);
    }
}
