<?php

namespace Tests\Feature\API;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class EventsAPITest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_return_events_in_hamburg()
    {
        create(
            \App\Event::class,
            [
                'longitude' => 46.60675,
                'latitude' => 13.84246,
                'status' => 'APPROVED',
            ],
            3
        );

        $badLatitudeEvent = create(\App\Event::class, [
            'longitude' => 9.87985,
            'latitude' => 55.5311,
            'status' => 'APPROVED',
        ]);

        $badLongitudeEvent = create(\App\Event::class, [
            'longitude' => 19.87985,
            'latitude' => 53.5311,
            'status' => 'APPROVED',
        ]);

        $hamburgEvent = create(\App\Event::class, [
            'title' => 'Good Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'status' => 'APPROVED',
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
    public function it_should_return_events_geolocalized_for_specific_year()
    {
        create(
            \App\Event::class,
            [
                'longitude' => 46.60675,
                'latitude' => 13.84246,
            ],
            3
        );

        $badLatitudeEvent = create(\App\Event::class, [
            'longitude' => 9.87985,
            'latitude' => 55.5311,
            'status' => 'APPROVED',
        ]);

        $badLongitudeEvent = create(\App\Event::class, [
            'longitude' => 19.87985,
            'latitude' => 53.5311,
            'status' => 'APPROVED',
        ]);

        $pastEvent = create(\App\Event::class, [
            'title' => '2020 Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'status' => 'APPROVED',
            'end_date' => Carbon::now()->setYear(2020),
        ]);

        $goodEvent = create(\App\Event::class, [
            'title' => '2021 Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'status' => 'APPROVED',
            'end_date' => Carbon::now()->setYear(2021),
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
    public function it_should_return_events_geolocalized_for_current_year_by_default()
    {
        $pastEvent = create(\App\Event::class, [
            'title' => '2020 Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'status' => 'APPROVED',
            'end_date' => Carbon::now()->setYear(2020),
        ]);

        $currentYearEvent = create(\App\Event::class, [
            'title' => 'Current Year Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'status' => 'APPROVED',
            'end_date' => Carbon::now(),
        ]);

        $response = $this->json(
            'GET',
            '/api/events/geobox?lat1=53&long1=9&lat2=54&long2=10'
        );

        $data = $response->decodeResponseJson()['data'];

        $this->assertCount(1, $data);
        $this->assertEquals('Current Year Event', $data[0]['title']);
    }

    /** @test */
    public function it_should_not_return_events_with_bad_year()
    {
        $this->withoutExceptionHandling();
        try {
            $response = $this->json(
                'GET',
                '/api/events/geobox?lat1=53&long1=9&lat2=54&long2=10&year=aaa'
            );
        } catch (ValidationException $e) {
            $this->assertEquals(
                'The year must be a number.',
                $e->getMessage()
            );
        }
    }

    /** @test */
    public function it_should_not_return_non_approved_events()
    {
        $pendingEvent = create(\App\Event::class, [
            'title' => 'Pending Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'status' => 'PENDING',
        ]);

        $approvedEvent = create(\App\Event::class, [
            'title' => 'Approved Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'status' => 'APPROVED',
            'end_date' => Carbon::now(),
        ]);

        $response = $this->json(
            'GET',
            '/api/events/geobox?lat1=53&long1=9&lat2=54&long2=10'
        );

        $data = $response->decodeResponseJson()['data'];

        $this->assertCount(1, $data);
        $this->assertEquals('Approved Event', $data[0]['title']);
    }

    /** @test */
    public function it_should_not_return_events_with_latitude_too_wide()
    {
        $this->withoutExceptionHandling();

        $response = $this->json(
            'GET',
            '/api/events/geobox?lat1=40&long1=9&lat2=51&long2=10'
        );

        $errorMessage = $response->decodeResponseJson()['error'];

        $response->assertStatus(500);
        $this->assertEquals('Area is too wide', $errorMessage);
    }

    /** @test */
    public function it_should_not_return_events_with_longitude_too_wide()
    {
        $this->withoutExceptionHandling();

        $response = $this->json(
            'GET',
            '/api/events/geobox?lat1=40&long1=9&lat2=51&long2=100'
        );

        $errorMessage = $response->decodeResponseJson()['error'];

        $response->assertStatus(500);
        $this->assertEquals('Area is too wide', $errorMessage);
    }

    /** @test */
    public function it_should_return_german_events()
    {

        $frenchEvent = create(\App\Event::class, [
            'country_iso' => 'FR',
            'status' => 'APPROVED',
            'end_date' => Carbon::now()->setYear(2022),
        ]);

        $germanEvent = create(\App\Event::class, [
            'title' => 'Good Event',
            'status' => 'APPROVED',
            'country_iso' => 'DE',
            'end_date' => Carbon::now()->setYear(2022),
        ]);

        $importedGermanEvent = create(\App\Event::class, [
            'title' => 'Imported Event',
            'status' => 'APPROVED',
            'country_iso' => 'DE',
            'codeweek_for_all_participation_code' => 'cw22-bonn',
            'end_date' => Carbon::now()->setYear(2022),
        ]);

        $response = $this->json(
            'GET',
            '/api/events/germany?year=2022',
        );

        $data = $response->decodeResponseJson()['data'];

        $this->assertCount(2, $data);

        $this->assertEquals('Good Event', $data[0]['title']);
        $this->assertEquals('Imported Event', $data[1]['title']);

        $this->assertFalse($data[0]['imported_from_german_feeds']);
        $this->assertTrue($data[1]['imported_from_german_feeds']);
    }

    /** @test */
    public function it_should_get_one_event_details()
    {

        $event = create(\App\Event::class, [
            'id' => 1456,
            'status' => 'APPROVED',
            'title' => 'foobar',
        ]);

        $response = $this->getJson('/api/event-detail/1456');

        $this->assertEquals($response['data']['title'], $event->title);

    }
}
