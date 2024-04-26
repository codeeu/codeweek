<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Helpers\EventHelper;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

final class EventsHelperTest extends TestCase
{
    /*
     * This tests have to use MySQL because of date functions.
     */

    use DatabaseMigrations;

    #[Test]
    public function it_should_get_upcoming_online_events(): void
    {
        //Good ones
        \App\Event::factory()->create(['activity_type' => 'open-online', 'status' => 'APPROVED', 'start_date' => Carbon::now()->addDay(), 'highlighted_status' => 'FEATURED']);
        \App\Event::factory()->create(['activity_type' => 'open-online', 'status' => 'APPROVED', 'start_date' => Carbon::now()->addDays(10), 'highlighted_status' => 'FEATURED']);

        //Bad ones
        \App\Event::factory()->create(['activity_type' => 'open-online', 'status' => 'APPROVED', 'start_date' => Carbon::now()->subDays(10)]);
        \App\Event::factory()->create(['activity_type' => 'open-closed', 'status' => 'APPROVED']);
        \App\Event::factory()->create(['activity_type' => 'open-online', 'status' => 'PENDING']);
        \App\Event::factory()->create(['activity_type' => 'open-offline', 'status' => 'APPROVED']);
        \App\Event::factory()->create(['activity_type' => 'invite -online', 'status' => 'APPROVED', 'start_date' => Carbon::now()->addDays(10), 'highlighted_status' => 'FEATURED']);

        $events = EventHelper::getOnlineEvents();
        $this->assertCount(2, $events);
    }

    #[Test]
    public function it_should_trim_geoposition(): void
    {

        //Bad ones
        $event = \App\Event::factory()->create(['latitude' => (float) 7.123456798, 'longitude' => (float) 8.987654321]);

        $trimmed = EventHelper::trimGeoposition($event->latitude, $event->longitude);
        $expected = '7.12,8.99';
        $this->assertEquals($expected, $trimmed);
    }
}
