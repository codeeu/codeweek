<?php

namespace Tests\Feature;

use App\Audience;
use App\Helpers\MeetAndCodeHelper;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateThemeAndAudienceTest extends TestCase
{

    use DatabaseMigrations;

     /** @test */
      function it_should_not_create_if_themes_already_exist()
      {

          create('App\Audience',[],10);


          // Create Event with event_url from meet and code
          $myEvent = create('App\Event', ['event_url' => 'https://meet-and-code.org/hu/hu/event-show/3959','country_iso' => 'HU', 'language' => null]);
          $myEvent->audiences()->attach(8);

//          $this->assertEquals(1,$myEvent->audiences()->get()->count());
          $this->assertCount(1,$myEvent->audiences);

          // Call the updater
          $this->artisan('meetandcode:themes');

          $this->assertCount(1,$myEvent->audiences);

      }

      /** @test */
      function it_should_change_the_audience_for_meet_and_code()
      {

          create('App\Audience',[],10);


          // Create Event with event_url from meet and code
          $myEvent = create('App\Event', ['event_url' => 'https://meet-and-code.org/hu/hu/event-show/3959','country_iso' => 'HU', 'language' => null]);

          $this->assertFalse($myEvent->audiences()->exists());

          // Call the updater
          $this->artisan('meetandcode:themes');

          $this->assertTrue($myEvent->audiences()->exists());

      }

      /** @test */
      function it_should_change_the_theme_for_meet_and_code()
      {

          create('App\Theme',[],10);


          // Create Event with event_url from meet and code
          $myEvent = create('App\Event', ['event_url' => 'https://meet-and-code.org/hu/hu/event-show/3959','country_iso' => 'HU', 'language' => null]);

          $this->assertFalse($myEvent->themes()->exists());

          // Call the updater
          $this->artisan('meetandcode:themes');

          $this->assertTrue($myEvent->themes()->exists());


      }



}
