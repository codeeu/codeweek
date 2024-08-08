<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class MapTest extends TestCase
{
    use DatabaseMigrations;

    private $ambassador_be;

    private $ambassador_fr;

    private $admin_be;

    private $belgium;

    private $france;

    #[Test]
    public function get_list_of_approved_upcoming_events(): void
    {

        $this->withExceptionHandling();

        \App\Event::factory()->count(7)->create(['start_date' => Carbon::now(), 'end_date' => Carbon::now()->addDay(), 'status' => 'APPROVED', 'country_iso' => 'BE']);
        \App\Event::factory()->count(6)->create(['start_date' => Carbon::now(), 'end_date' => Carbon::now()->addDay(), 'status' => 'PENDING', 'country_iso' => 'BE']);
        \App\Event::factory()->count(3)->create(['start_date' => Carbon::now()->subyear(), 'status' => 'APPROVED']);

        $results = $this->json('GET', '/api/event/list');

        $this->assertCount(7, $results->json()['BE']);

    }

    #[Test]
    public function get_list_of_approved_events_for_another_year(): void
    {

        $this->withExceptionHandling();

        \App\Event::factory()->count(7)->create(['start_date' => Carbon::now(), 'status' => 'APPROVED', 'country_iso' => 'BE']);
        \App\Event::factory()->count(6)->create(['start_date' => Carbon::now(), 'status' => 'PENDING', 'country_iso' => 'BE']);
        \App\Event::factory()->count(3)->create(['start_date' => Carbon::now()->subyear(), 'end_date' => Carbon::now()->subyear(), 'status' => 'APPROVED', 'country_iso' => 'BE']);

        $results = $this->json('GET', '/api/event/list?year='.Carbon::now()->subyear()->year);

        $this->assertCount(3, $results->json()['BE']);

    }

    #[Test]
    public function structure_event(): void
    {

        \App\Event::factory()->count(7)->create(['start_date' => Carbon::now(), 'status' => 'APPROVED', 'country_iso' => 'BE']);
        \App\Event::factory()->count(6)->create(['start_date' => Carbon::now(), 'status' => 'PENDING', 'country_iso' => 'BE']);
        \App\Event::factory()->count(3)->create(['start_date' => Carbon::now()->subyear(), 'status' => 'APPROVED', 'country_iso' => 'BE']);

        $result = $this->getJson('/api/event/list');

        $item = $result->json()['BE'][0];

        $this->assertArrayHasKey('id', $item);
        $this->assertArrayHasKey('geoposition', $item);

    }

    #[Test]
    public function get_event_detail(): void
    {

        $this->withExceptionHandling();

        $event = \App\Event::factory()->create(['start_date' => Carbon::now(), 'status' => 'APPROVED', 'title' => 'foobar']);

        $response = $this->getJson('/api/event/detail?id='.$event->id)->json();

        $this->assertEquals($response['data']['title'], $event->title);

    }
}
