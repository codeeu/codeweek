<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateLanguageTest extends TestCase
{
     /** @test */
      function it_should_change_the_language_for_meet_and_code()
      {
         // Create Event with event_url from meet and code
          $myEvent = create('App\Event', ['event_url' => 'https://meet-and-code.org/hu/hu/event-show/3959']);
         // Call the updater


         // Assert Language is set
      }

}
