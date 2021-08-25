<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventsAPITest extends TestCase {
    use DatabaseMigrations;
    /** @test */
    public function it_should_return_events_between_coordinates() {
        create(
            'App\Event',
            [
                'longitude' => 46.60675,
                'latitude' => 13.84246
            ],
            3
        );

        $badLatitudeEvent = create('App\Event', [
            'longitude' => 50.12345,
            'latitude' => 21.6789
        ]);

        $badLongitudeEvent = create('App\Event', [
            'longitude' => 51.12345,
            'latitude' => 20.6789
        ]);

        $goodEvent = create('App\Event', [
            'title' => 'Good Event',
            'longitude' => 50.12345,
            'latitude' => 20.6789
        ]);

        $response = $this->json(
            'GET',
            '/api/events/geobox?lat1=20&long1=50&lat2=21&long2=51'
        );

        $data = $response->decodeResponseJson()['data'];

        $this->assertCount(1, $data);
        $this->assertEquals('Good Event', $data[0]['title']);
    }
}
