<?php

namespace Tests\Feature;

use App\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class RelocateOnlineActivities extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function it_should_relocate_event(): void
    {

        $france = \App\Country::factory()->create(['iso' => 'FR', 'longitude' => 2.824354, 'latitude' => 46.980252]);

        $this->signIn(User::factory()->create());

        $badPosition = \App\Event::factory()->create(['country_iso' => 'FR', 'geoposition' => '0,0']);
        $goodPosition = \App\Event::factory()->create(['country_iso' => 'FR', 'geoposition' => '3,47']);

        $this->artisan('relocate');

        //      $this->assertNotEquals("0,0",$badPosition->fresh()->geoposition);
        $this->assertEquals('46.980252,2.824354', $badPosition->fresh()->geoposition);
        $this->assertEquals('3,47', $goodPosition->fresh()->geoposition);

    }

    #[Test]
    public function it_should_relocate_event_on_creation(): void
    {
        Mail::fake();
        $this->seed('RolesAndPermissionsSeeder');

        $france = \App\Country::factory()->create(['iso' => 'FR', 'longitude' => 2.824354, 'latitude' => 46.980252]);

        $this->signIn(User::factory()->create());

        $this->withoutExceptionHandling();
        $this->signIn();

        $event = \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

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
