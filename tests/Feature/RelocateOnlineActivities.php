<?php

namespace Tests\Feature;

use App\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RelocateOnlineActivities extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_relocate_event(): void
    {

        $france = create(\App\Country::class, ['iso' => 'FR', 'longitude' => 2.824354, 'latitude' => 46.980252]);

        $this->signIn(create(\App\User::class));

        $badPosition = create(\App\Event::class, ['country_iso' => 'FR', 'geoposition' => '0,0']);
        $goodPosition = create(\App\Event::class, ['country_iso' => 'FR', 'geoposition' => '3,47']);

        $this->artisan('relocate');

        //      $this->assertNotEquals("0,0",$badPosition->fresh()->geoposition);
        $this->assertEquals('46.980252,2.824354', $badPosition->fresh()->geoposition);
        $this->assertEquals('3,47', $goodPosition->fresh()->geoposition);

    }

    /** @test */
    public function it_should_relocate_event_on_creation(): void
    {
        Mail::fake();
        $this->seed('RolesAndPermissionsSeeder');

        $france = create(\App\Country::class, ['iso' => 'FR', 'longitude' => 2.824354, 'latitude' => 46.980252]);

        $this->signIn(create(\App\User::class));

        $this->withoutExceptionHandling();
        $this->signIn();

        $event = make(\App\Event::class);
        create(\App\Audience::class, [], 3);
        create(\App\Theme::class, [], 3);

        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;
        $event->geoposition = null;
        $event->language = 'nl';
        $event->country_iso = 'FR';

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        $this->assertEquals('46.980252,2.824354', $event->fresh()->geoposition);

    }
}
