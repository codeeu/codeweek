<?php

namespace Tests\Feature;

use App\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RelocateOnlineActivities extends TestCase
{

    use DatabaseMigrations;
 /** @test */
  function it_should_relocate_event()
  {

      $france = create('App\Country',['iso'=>'FR',"longitude"=>2.824354, "latitude"=>46.980252]);

      $this->signIn(create('App\User'));

      $badPosition = create('App\Event', ["country_iso"=>"FR", "geoposition"=>"0,0"]);
      $goodPosition = create('App\Event', ["country_iso"=>"FR", "geoposition"=>"3,47"]);

      $this->artisan('relocate');

//      $this->assertNotEquals("0,0",$badPosition->fresh()->geoposition);
      $this->assertEquals("46.980252,2.824354",$badPosition->fresh()->geoposition);
      $this->assertEquals("3,47",$goodPosition->fresh()->geoposition);

  }

  /** @test */
  function it_should_relocate_event_on_creation()
  {
      Mail::fake();
      $this->seed('RolesAndPermissionsSeeder');

      $france = create('App\Country',['iso'=>'FR',"longitude"=>2.824354, "latitude"=>46.980252]);

      $this->signIn(create('App\User'));


      $this->withoutExceptionHandling();
      $this->signIn();

      $event = make('App\Event');
      create('App\Audience',[] ,3);
      create('App\Theme', [],3);

      $event->theme = "1";
      $event->tags = "tag:foo,tag:bar";
      $event->audience = "2, 3";
      $event->privacy = true;
      $event->geoposition = null;
      $event->language = "nl";
      $event->country_iso = "FR";


      $this->post('/events', $event->toArray());

      $event = Event::where('title', $event->title)->first();

      $this->assertEquals("46.980252,2.824354",$event->fresh()->geoposition);


  }

}
