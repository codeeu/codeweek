<?php

namespace Tests\Feature;

use App\Helpers\MeetAndCodeHelper;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateLanguageTest extends TestCase
{

    use DatabaseMigrations;

     /** @test */
      function it_should_change_the_language_for_meet_and_code()
      {
         // Create Event with event_url from meet and code
          $myEvent = create('App\Event', ['event_url' => 'https://meet-and-code.org/hu/hu/event-show/3959','country_iso' => 'HU', 'language' => null]);
         // Call the updater
          $this->artisan('meetandcode:languages');

         // Assert Language is set
          $this->assertEquals('hu', $myEvent->fresh()->language);
      }

      /** @test */
      function it_should_not_change_the_language_for_meet_and_code_with_languages_set()
      {
         // Create Event with event_url from meet and code
          $myEvent = create('App\Event', ['event_url' => 'https://meet-and-code.org/hu/hu/event-show/3959', 'language' => 'bar']);
         // Call the updater
          $this->artisan('meetandcode:languages');

         // Assert Language is set
          $this->assertEquals('bar', $myEvent->fresh()->language);
      }
      
       /** @test */
        function it_should_get_language_from_Meet_and_code_URL()
        {
            $url = "https://meet-and-code.org/be/nl/event-show/3959";
            $result = MeetAndCodeHelper::getLanguage($url);
            $this->assertEquals("nl",$result);
        }

        /** @test */
        function it_should_not_get_language_from_Meet_and_code_first_URLs()
        {
            $url = "https://meet-and-code.org/event/details/216";
            $result = MeetAndCodeHelper::getLanguage($url);
            $this->assertEquals(null,$result);
        }

        /** @test */
        function it_should_not_get_language_from_Meet_and_code_bad_URLs()
        {
            $url = "https://meet-and-code.org/ro";
            $result = MeetAndCodeHelper::getLanguage($url);
            $this->assertEquals(null,$result);
        }

        /** @test */
        function it_should_not_get_language_from_Meet_and_code_for_russian()
        {
            $url = "https://meet-and-code.org/be/ru/event-show/3959";
            $result = MeetAndCodeHelper::getLanguage($url);
            $this->assertEquals(null,$result);
        }

        /** @test */
        function it_should_not_get_language_from_Meet_and_code_for_norwegian()
        {
            $url = "https://meet-and-code.org/be/no/event-show/3959";
            $result = MeetAndCodeHelper::getLanguage($url);
            $this->assertEquals(null,$result);
        }

        /** @test */
        function it_should_not_get_language_from_Meet_and_code_for_kazakztan()
        {
            $url = "https://meet-and-code.org/be/ks/event-show/3959";
            $result = MeetAndCodeHelper::getLanguage($url);
            $this->assertEquals(null,$result);
        }

        /** @test */
        function it_should_get_language_from_Meet_and_code_for_ireland()
        {
            $url = "https://meet-and-code.org/be/ie/event-show/3959";
            $result = MeetAndCodeHelper::getLanguage($url);
            $this->assertEquals("en",$result);
        }

}
