<?php

namespace Tests\Feature\API;

use PHPUnit\Framework\Attributes\Test;
use App\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

final class EventsAPITest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function it_should_return_events_in_hamburg(): void
    {
        Event::factory()->count(3)->
        create(

            [
                'longitude' => 46.60675,
                'latitude' => 13.84246,
                'status' => 'APPROVED',
            ]

        );

        $badLatitudeEvent = \App\Event::factory()->create([
            'longitude' => 9.87985,
            'latitude' => 55.5311,
            'status' => 'APPROVED',
        ]);

        $badLongitudeEvent = \App\Event::factory()->create([
            'longitude' => 19.87985,
            'latitude' => 53.5311,
            'status' => 'APPROVED',
        ]);

        $hamburgEvent = \App\Event::factory()->create([
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

    #[Test]
    public function it_should_return_events_geolocalized_for_specific_year(): void
    {


        Event::factory()->count(3)->
        create(

            [
                'longitude' => 46.60675,
                'latitude' => 13.84246
            ]

        );

        $badLatitudeEvent = \App\Event::factory()->create([
            'longitude' => 9.87985,
            'latitude' => 55.5311,
            'status' => 'APPROVED',
        ]);

        $badLongitudeEvent = \App\Event::factory()->create([
            'longitude' => 19.87985,
            'latitude' => 53.5311,
            'status' => 'APPROVED',
        ]);

        $pastEvent = \App\Event::factory()->create([
            'title' => '2020 Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'status' => 'APPROVED',
            'end_date' => Carbon::now()->setYear(2020),
        ]);

        $goodEvent = \App\Event::factory()->create([
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

    #[Test]
    public function it_should_return_events_geolocalized_for_current_year_by_default(): void
    {
        $pastEvent = \App\Event::factory()->create([
            'title' => '2020 Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'status' => 'APPROVED',
            'end_date' => Carbon::now()->setYear(2020),
        ]);

        $currentYearEvent = \App\Event::factory()->create([
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

    #[Test]
    public function it_should_not_return_events_with_bad_year(): void
    {
        $this->withoutExceptionHandling();
        try {
            $response = $this->json(
                'GET',
                '/api/events/geobox?lat1=53&long1=9&lat2=54&long2=10&year=aaa'
            );
        } catch (ValidationException $e) {
            $this->assertEquals(
                'The year field must be a number.',
                $e->getMessage()
            );
        }
    }

    #[Test]
    public function it_should_not_return_non_approved_events(): void
    {
        $pendingEvent = \App\Event::factory()->create([
            'title' => 'Pending Event',
            'longitude' => 9.87985,
            'latitude' => 53.5311,
            'status' => 'PENDING',
        ]);

        $approvedEvent = \App\Event::factory()->create([
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

    #[Test]
    public function it_should_not_return_events_with_latitude_too_wide(): void
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

    #[Test]
    public function it_should_not_return_events_with_longitude_too_wide(): void
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

    #[Test]
    public function it_should_return_german_events(): void
    {

        $frenchEvent = \App\Event::factory()->create([
            'country_iso' => 'FR',
            'status' => 'APPROVED',
            'end_date' => Carbon::now()->setYear(2022),
        ]);

        $germanEvent = \App\Event::factory()->create([
            'title' => 'Good Event',
            'status' => 'APPROVED',
            'country_iso' => 'DE',
            'end_date' => Carbon::now()->setYear(2022),
        ]);

        $importedGermanEvent = \App\Event::factory()->create([
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

    #[Test]
    public function it_should_get_one_event_details(): void
    {

        $event = \App\Event::factory()->create([
            'id' => 1456,
            'status' => 'APPROVED',
            'title' => 'foobar',
        ]);

        $response = $this->getJson('/api/event-detail/1456');

        $this->assertEquals($response['data']['title'], $event->title);

    }
}
