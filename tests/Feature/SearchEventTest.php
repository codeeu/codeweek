<?php

namespace Tests\Feature;

use App\Audience;
use App\Theme;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SearchEventTest extends TestCase
{
    use DatabaseMigrations;

    public function setup()
    {
        parent::setUp();
        create('App\Country',[],20);


    }


    /** @test */
    public function a_user_can_search_events_by_country()
    {
        //Given that we select a country
        $eventInBelgium = create('App\Event', ['country'=>'BE']);
        $eventNotInBelgium = create('App\Event', ['country'=>'FR']);
        //We should return the events filtered for this country
        $this->get('search?country=BE')
            ->assertSee($eventInBelgium->title)
            ->assertDontSee($eventNotInBelgium->title);

        
    }

    /** @test */
    public function a_user_can_search_only_future_events()
    {
        $eventInThePast = create('App\Event', ['end_date'=>new Carbon('yesterday')]);
        $eventInTheFuture = create('App\Event', ['end_date'=>new Carbon('tomorrow')]);
        $this->get('search?past=no')
            ->assertSee($eventInTheFuture->title)
            ->assertDontSee($eventInThePast->title);

    }

    /** @test */
    public function a_user_can_search_on_all_events()
    {
        $eventInThePast = create('App\Event', ['end_date'=>new Carbon('yesterday')]);
        $eventInTheFuture = create('App\Event', ['end_date'=>new Carbon('tomorrow')]);
        $this->get('search?past=yes')
            ->assertSee($eventInTheFuture->title)
            ->assertSee($eventInThePast->title);

    }

    /** @test */
    public function a_user_can_search_by_query_on_title()
    {
        $eventWithPython = create('App\Event', ['title'=>'Learn Python with us']);
        $eventWithoutPython = create('App\Event', ['title'=>'Learn JAVA with us']);

        $this->get('search?q=python')
            ->assertSee($eventWithPython->title)
            ->assertDontSee($eventWithoutPython->title);

    }

    /** @test */
    public function a_user_can_search_by_theme()
    {


        create('App\Theme',[],3);
        $eventWithTheme = create('App\Event');
        $theme = Theme::find(1);
        $eventWithTheme->themes()->save($theme);

        $eventWithTheme2 = create('App\Event');
        $theme = Theme::find(2);
        $eventWithTheme2->themes()->save($theme);

        $eventWithTheme3 = create('App\Event');
        $theme = Theme::find(3);
        $eventWithTheme3->themes()->save($theme);

        $eventWithoutTheme = create('App\Event');


        $this->get('search?theme[]=1&theme[]=2')
            ->assertSee($eventWithTheme->title)
            ->assertSee($eventWithTheme2->title)
            ->assertDontSee($eventWithTheme3->title)
            ->assertDontSee($eventWithoutTheme->title);

    }

    /** @test */
    public function a_user_can_search_by_audience()
    {
        create('App\Audience',[],3);
        $eventWithAudience = create('App\Event');
        $audience = Audience::find(1);
        $eventWithAudience->audiences()->save($audience);

        $eventWithAudience2 = create('App\Event');
        $audience = Audience::find(2);
        $eventWithAudience2->audiences()->save($audience);

        $eventWithAudience3 = create('App\Event');
        $audience = Audience::find(3);
        $eventWithAudience3->audiences()->save($audience);

        $eventWithoutAudience = create('App\Event');


        $this->get('search?audience[]=1&audience[]=2')
            ->assertSee($eventWithAudience->title)
            ->assertSee($eventWithAudience2->title)
            ->assertDontSee($eventWithAudience3->title)
            ->assertDontSee($eventWithoutAudience->title);

    }




}


