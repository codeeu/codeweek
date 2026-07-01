<?php

namespace Tests\Unit;

use App\Event;
use App\Services\BulkEventDuplicateFinder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class BulkEventDuplicateFinderTest extends TestCase
{
    use RefreshDatabase;

    public function test_does_not_match_when_only_address_differs(): void
    {
        Event::factory()->create([
            'title' => 'Coding workshop',
            'organizer' => 'Example School',
            'location' => '1 Main Street',
            'country_iso' => 'IE',
            'start_date' => '2026-10-10 09:00:00',
            'end_date' => '2026-10-10 12:00:00',
            'latitude' => 53.3,
            'longitude' => -6.2,
        ]);

        $match = app(BulkEventDuplicateFinder::class)->find([
            'title' => 'Coding workshop',
            'start_date' => '2026-10-10 09:00:00',
            'country_iso' => 'IE',
            'organizer' => 'Example School',
            'location' => '2 Other Road',
            'latitude' => 53.31,
            'longitude' => -6.21,
        ]);

        $this->assertNull($match);
    }

    public function test_matches_when_core_fields_and_address_are_the_same(): void
    {
        $event = Event::factory()->create([
            'title' => 'Coding workshop',
            'organizer' => 'Example School',
            'location' => '1 Main Street',
            'country_iso' => 'IE',
            'start_date' => '2026-10-10 09:00:00',
            'end_date' => '2026-10-10 12:00:00',
            'latitude' => 53.3,
            'longitude' => -6.2,
        ]);

        $match = app(BulkEventDuplicateFinder::class)->find([
            'title' => 'Coding workshop',
            'start_date' => '2026-10-10 09:00:00',
            'country_iso' => 'IE',
            'organizer' => 'Example School',
            'location' => '1 Main Street',
            'latitude' => 53.30001,
            'longitude' => -6.20001,
        ]);

        $this->assertNotNull($match);
        $this->assertSame($event->id, $match->id);
    }

    public function test_does_not_match_when_coordinates_differ_and_address_is_empty(): void
    {
        Event::factory()->create([
            'title' => 'Robotics day',
            'organizer' => 'STEM Hub',
            'location' => '',
            'country_iso' => 'DE',
            'start_date' => '2026-11-01 10:00:00',
            'end_date' => '2026-11-01 14:00:00',
            'latitude' => 52.52,
            'longitude' => 13.405,
        ]);

        $match = app(BulkEventDuplicateFinder::class)->find([
            'title' => 'Robotics day',
            'start_date' => '2026-11-01 10:00:00',
            'country_iso' => 'DE',
            'organizer' => 'STEM Hub',
            'location' => '',
            'latitude' => 48.13,
            'longitude' => 11.58,
        ]);

        $this->assertNull($match);
    }
}
