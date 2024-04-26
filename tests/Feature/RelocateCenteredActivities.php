<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Event;
use App\Helpers\EventHelper;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

final class RelocateCenteredActivities extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function it_should_filter_centered_and_non_relocated_events(): void
    {
        $france = \App\Country::factory()->create([
            'iso' => 'FR',
            'longitude' => 2.824354,
            'latitude' => 46.980252,
        ]);

        $this->signIn(User::factory()->create());

        $goodPosition = \App\Event::factory()->create([
            'country_iso' => 'FR',
            'geoposition' => '46.980252,2.824354',
            'title' => 'foobar is love',
            'longitude' => 2.824354,
            'latitude' => 46.980252,
        ]);

        $relocated = \App\Event::factory()->create([
            'country_iso' => 'FR',
            'geoposition' => '46.980252,2.824354',
            'longitude' => 2.824354,
            'latitude' => 46.980252,
            'relocated' => true,
        ]);

        $elsewhere = \App\Event::factory()->create([
            'country_iso' => 'FR',
            'geoposition' => '47.980252,3.824354',
            'longitude' => 3.824354,
            'latitude' => 47.980252,
            'relocated' => false,
        ]);

        $online = \App\Event::factory()->create([
            'country_iso' => 'FR',
            'geoposition' => '47.980252,3.824354',
            'longitude' => 2.824354,
            'latitude' => 46.980252,
            'location' => 'online',
            'relocated' => false,
        ]);

        $events = EventHelper::getCenteredNotRelocatedEvents('FR');

        $this->assertCount(1, $events);
        $this->assertEquals('foobar is love', $events[0]->title);
    }

    /** @test */
    //  function it_should_relocate_event_on_creation()
    //  {
    //      Mail::fake();
    //      $this->seed('RolesAndPermissionsSeeder');
    //
    //      $france = create('App\Country',['iso'=>'FR',"longitude"=>2.824354, "latitude"=>46.980252]);
    //
    //      $this->signIn(create('App\User'));
    //
    //
    //      $this->withoutExceptionHandling();
    //      $this->signIn();
    //
    //      $event = make('App\Event');
    //      create('App\Audience',[] ,3);
    //      create('App\Theme', [],3);
    //
    //      $event->theme = "1";
    //      $event->tags = "tag:foo,tag:bar";
    //      $event->audience = "2, 3";
    //      $event->privacy = true;
    //      $event->geoposition = null;
    //      $event->language = "nl";
    //      $event->country_iso = "FR";
    //
    //
    //      $this->post('/events', $event->toArray());
    //
    //      $event = Event::where('title', $event->title)->first();
    //
    //      $this->assertEquals("46.980252,2.824354",$event->fresh()->geoposition);
    //
    //
    //  }
}
