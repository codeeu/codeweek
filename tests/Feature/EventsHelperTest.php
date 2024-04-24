<?php

namespace Tests\Feature;

use App\Helpers\EventHelper;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EventsHelperTest extends TestCase
{
    /*
     * This tests have to use MySQL because of date functions.
     */

    use DatabaseMigrations;

    /** @test */
    public function it_should_get_upcoming_online_events()
    {
        //Good ones
        create('App\Event', ['activity_type' => 'open-online', 'status' => 'APPROVED', 'start_date' => Carbon::now()->addDay(), 'highlighted_status' => 'FEATURED']);
        create('App\Event', ['activity_type' => 'open-online', 'status' => 'APPROVED', 'start_date' => Carbon::now()->addDays(10), 'highlighted_status' => 'FEATURED']);

        //Bad ones
        create('App\Event', ['activity_type' => 'open-online', 'status' => 'APPROVED', 'start_date' => Carbon::now()->subDays(10)]);
        create('App\Event', ['activity_type' => 'open-closed', 'status' => 'APPROVED']);
        create('App\Event', ['activity_type' => 'open-online', 'status' => 'PENDING']);
        create('App\Event', ['activity_type' => 'open-offline', 'status' => 'APPROVED']);
        create('App\Event', ['activity_type' => 'invite -online', 'status' => 'APPROVED', 'start_date' => Carbon::now()->addDays(10), 'highlighted_status' => 'FEATURED']);

        $events = EventHelper::getOnlineEvents();
        $this->assertCount(2, $events);
    }

    /** @test */
    public function it_should_trim_geoposition()
    {

        //Bad ones
        $event = create('App\Event', ['latitude' => (float) 7.123456798, 'longitude' => (float) 8.987654321]);

        $trimmed = EventHelper::trimGeoposition($event->latitude, $event->longitude);
        $expected = '7.12,8.99';
        $this->assertEquals($expected, $trimmed);
    }
}
