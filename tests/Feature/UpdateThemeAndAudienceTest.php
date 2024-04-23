<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdateThemeAndAudienceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_not_create_if_themes_already_exist()
    {

        create(\App\Audience::class, [], 10);

        // Create Event with event_url from meet and code
        $myEvent = create(\App\Event::class, ['event_url' => 'https://meet-and-code.org/hu/hu/event-show/3959', 'country_iso' => 'HU', 'language' => null]);
        $myEvent->audiences()->attach(8);

        //          $this->assertEquals(1,$myEvent->audiences()->get()->count());
        $this->assertCount(1, $myEvent->audiences);

        // Call the updater
        $this->artisan('meetandcode:themes');

        $this->assertCount(1, $myEvent->audiences);

    }

    /** @test */
    public function it_should_change_the_audience_for_meet_and_code()
    {

        create(\App\Audience::class, [], 10);

        // Create Event with event_url from meet and code
        $myEvent = create(\App\Event::class, ['event_url' => 'https://meet-and-code.org/hu/hu/event-show/3959', 'country_iso' => 'HU', 'language' => null]);

        $this->assertFalse($myEvent->audiences()->exists());

        // Call the updater
        $this->artisan('meetandcode:themes');

        $this->assertTrue($myEvent->audiences()->exists());

    }

    /** @test */
    public function it_should_change_the_theme_for_meet_and_code()
    {

        create(\App\Theme::class, [], 10);

        // Create Event with event_url from meet and code
        $myEvent = create(\App\Event::class, ['event_url' => 'https://meet-and-code.org/hu/hu/event-show/3959', 'country_iso' => 'HU', 'language' => null]);

        $this->assertFalse($myEvent->themes()->exists());

        // Call the updater
        $this->artisan('meetandcode:themes');

        $this->assertTrue($myEvent->themes()->exists());

    }
}
