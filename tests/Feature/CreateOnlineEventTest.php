<?php

namespace Tests\Feature;

use App\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CreateOnlineEventTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_create_online_event_without_location(): void
    {
        //$this->withoutExceptionHandling();
        $this->signIn();

        $event =  \App\Event::factory()->make();
        
        \App\Theme::factory()->count(3)->create();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;
        $event->location = null;
        $event->activity_type = 'open-online';
        $event->event_url = 'http://lesoir.be';
        $event->geoposition = null;
        $event->language = 'fi';

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        $this->assertEquals('online', $event->fresh()->location);
        $this->assertEquals('http://lesoir.be', $event->fresh()->event_url);
        $this->assertEquals('fi', $event->fresh()->language);
    }

    /** @test */
    public function an_authenticated_user_can_create_private_online_event_without_location(): void
    {
        //$this->withoutExceptionHandling();
        $this->seed('RolesAndPermissionsSeeder');
        $this->signIn();

        $event =  \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;
        $event->location = null;
        $event->activity_type = 'invite-online';
        $event->event_url = 'http://lesoir.be';
        $event->geoposition = null;
        $event->language = 'fi';

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        $this->assertEquals('online', $event->fresh()->location);
        $this->assertEquals('http://lesoir.be', $event->fresh()->event_url);
        $this->assertEquals('fi', $event->fresh()->language);
        Log::info($event->fresh()->latitude);
        Log::info($event->fresh()->longitude);
        $this->assertNotEquals(0, $event->fresh()->latitude);
        $this->assertNotEquals(0, $event->fresh()->longitude);
    }

    /** @test */
    public function online_event_can_have_a_location(): void
    {
        $this->withoutExceptionHandling();
        $this->seed('RolesAndPermissionsSeeder');
        $this->signIn();

        $event =  \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;
        $event->location = 'somewhere in Belgium';
        $event->activity_type = 'invite-online';
        $event->event_url = 'http://lesoir.be';
        $event->geoposition = null;
        $event->language = 'fi';
        $event->geoposition = '4.321,1.234';

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        $this->assertEquals('somewhere in Belgium', $event->fresh()->location);
        $this->assertEquals(4.321, $event->fresh()->latitude);
        $this->assertEquals(1.234, $event->fresh()->longitude);

    }
}
