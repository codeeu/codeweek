<?php

namespace Tests\Feature;

use App\Audience;
use App\Theme;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SearchEventTest extends TestCase
{
    use DatabaseMigrations;

    public function setup(): void
    {
        parent::setUp();
        create(\App\Country::class, [], 20);

    }

    /** @test */
    public function a_user_can_search_for_all_events()
    {
        $belgium = create(\App\Country::class, ['iso' => 'BE']);
        $france = create(\App\Country::class, ['iso' => 'FR']);
        //Given that we select a country
        $eventInBelgium = create(\App\Event::class, ['country_iso' => $belgium->iso, 'status' => 'APPROVED']);
        $eventNotInBelgium = create(\App\Event::class, ['country_iso' => $france->iso, 'status' => 'APPROVED']);

        //We should return the events filtered for this country
        $this->post('search', [])
            ->assertSee($eventInBelgium->title)
            ->assertSee($eventNotInBelgium->title);

    }

    /** @test */
    public function a_user_can_search_events_by_country()
    {
        $belgium = create(\App\Country::class, ['iso' => 'BE']);
        $france = create(\App\Country::class, ['iso' => 'FR']);
        //Given that we select a country
        $eventInBelgium = create(\App\Event::class, ['country_iso' => $belgium->iso, 'status' => 'APPROVED']);
        $eventNotInBelgium = create(\App\Event::class, ['country_iso' => $france->iso, 'status' => 'APPROVED']);

        //We should return the events filtered for this country
        $countryArr[] = (array) ['iso' => 'BE'];
        $result = $this->post('search', ['countries' => $countryArr]);

        //dd($result);

        $result->assertSee($eventInBelgium->title)
            ->assertDontSee($eventNotInBelgium->title);

    }

    /** @test */
    public function a_user_can_search_only_this_year_events()
    {
        $eventLastYear = create(\App\Event::class, ['start_date' => Carbon::now()->subYear(1), 'end_date' => Carbon::now()->subYear(1), 'status' => 'APPROVED']);
        $eventThisYear = create(\App\Event::class, ['start_date' => new Carbon('today'), 'status' => 'APPROVED']);
        $this->post('search', ['year' => Carbon::now()->year])
            ->assertDontSee($eventLastYear->title)
            ->assertSee($eventThisYear->title);
    }

    /** @test */
    public function a_user_can_search_previous_years_events()
    {
        $eventLastYear = create(\App\Event::class, ['start_date' => Carbon::now()->subYear(1), 'end_date' => Carbon::now()->subYear(1), 'status' => 'APPROVED']);
        $eventThisYear = create(\App\Event::class, ['start_date' => new Carbon('today'), 'status' => 'APPROVED']);

        //$this->post('search',['years'=>[Carbon::now()->year]])
        $this->post('search', ['query' => '', 'year' => Carbon::now()->subYear(1)->year])
            ->assertSee($eventLastYear->title)
            ->assertDontSee($eventThisYear->title);

    }

    /** @test */
    public function bug_fix_laravel58()
    {
        $eventLastYear = create(\App\Event::class, ['start_date' => Carbon::now()->subYear(1), 'end_date' => Carbon::now()->subYear(1), 'status' => 'APPROVED']);
        $eventThisYear = create(\App\Event::class, ['start_date' => new Carbon('today'), 'status' => 'APPROVED']);

        //$this->post('search',['years'=>[Carbon::now()->year]])
        $this->post('search', ['query' => '', 'year' => Carbon::now()->subYear(1)->year])
            ->assertSee($eventLastYear->title)
            ->assertDontSee($eventThisYear->title);

    }

    /** @test */
    public function a_user_can_search_on_all_events()
    {
        $eventInThePast = create(\App\Event::class, ['end_date' => new Carbon('yesterday'), 'status' => 'APPROVED']);
        $eventInTheFuture = create(\App\Event::class, ['end_date' => new Carbon('tomorrow'), 'status' => 'APPROVED']);
        $this->post('search', ['past' => 'yes'])
            ->assertSee($eventInTheFuture->title)
            ->assertSee($eventInThePast->title);

    }

    /** @test */
    public function a_user_can_search_by_query_on_title()
    {

        $this->withExceptionHandling();

        $eventWithPython = create(\App\Event::class, ['title' => 'Learn Python with us', 'status' => 'APPROVED']);
        $eventWithoutPython = create(\App\Event::class, ['title' => 'Learn JAVA with us', 'status' => 'APPROVED']);

        $this->post('search', ['query' => 'python'])
            ->assertSee($eventWithPython->title)
            ->assertDontSee($eventWithoutPython->title);

    }

    /** @test */
    public function a_user_can_search_by_query_on_codeweek_4_all_code()
    {

        $this->withExceptionHandling();

        $eventWithCodeweek4AllCode = create(\App\Event::class, ['codeweek_for_all_participation_code' => 'foobar', 'status' => 'APPROVED']);
        $eventWithoutCodeweek4AllCode = create(\App\Event::class, ['title' => 'Learn JAVA with us', 'status' => 'APPROVED']);

        $this->post('search', ['query' => 'foobar'])
            ->assertSee($eventWithCodeweek4AllCode->title)
            ->assertDontSee($eventWithoutCodeweek4AllCode->title);

    }

    /** @test */
    public function a_user_can_search_by_theme()
    {

        create(\App\Theme::class, [], 3);
        $eventWithTheme = create(\App\Event::class, ['status' => 'APPROVED']);
        $theme = Theme::find(1);
        $eventWithTheme->themes()->save($theme);

        $eventWithTheme2 = create(\App\Event::class, ['status' => 'APPROVED']);
        $theme2 = Theme::find(2);
        $eventWithTheme2->themes()->save($theme2);

        $eventWithTheme3 = create(\App\Event::class, ['status' => 'APPROVED']);
        $theme3 = Theme::find(3);
        $eventWithTheme3->themes()->save($theme3);

        $eventWithoutTheme = create(\App\Event::class, ['status' => 'APPROVED']);

        $themes = [$theme, $theme2];

        $this->post('search', ['themes' => $themes])
            ->assertSee($eventWithTheme->title)
            ->assertSee($eventWithTheme2->title)
            ->assertDontSee($eventWithTheme3->title)
            ->assertDontSee($eventWithoutTheme->title);

    }

    /** @test */
    public function a_user_can_search_by_audience()
    {
        create(\App\Audience::class, [], 3);
        $eventWithAudience = create(\App\Event::class, ['status' => 'APPROVED']);
        $audience = Audience::find(1);
        $eventWithAudience->audiences()->save($audience);

        $eventWithAudience2 = create(\App\Event::class, ['status' => 'APPROVED']);
        $audience2 = Audience::find(2);
        $eventWithAudience2->audiences()->save($audience2);

        $eventWithAudience3 = create(\App\Event::class, ['status' => 'APPROVED']);
        $audience3 = Audience::find(3);
        $eventWithAudience3->audiences()->save($audience3);

        $eventWithoutAudience = create(\App\Event::class, ['status' => 'APPROVED']);

        $audiences = [$audience, $audience2];

        $this->post('search', compact('audiences'))
            ->assertSee($eventWithAudience->title)
            ->assertSee($eventWithAudience2->title)
            ->assertDontSee($eventWithAudience3->title)
            ->assertDontSee($eventWithoutAudience->title);

    }

    /** @test */
    public function a_user_can_search_by_codeweek_4_all_tag()
    {

        $good = create(\App\Event::class, ['codeweek_for_all_participation_code' => 'cw22-foobar', 'status' => 'APPROVED']);
        $bad = create(\App\Event::class, ['codeweek_for_all_participation_code' => 'cw22-bad', 'status' => 'APPROVED']);

        $this->post('search', ['query' => 'cw22-foobar'])
            ->assertSee($good->title)
            ->assertDontSee($bad->title);

    }

    /** @test */
    public function a_user_can_search_by_codeweek_4_all_tag_in_the_tag_field()
    {

        $good = create(\App\Event::class, ['codeweek_for_all_participation_code' => 'cw22-foobar', 'status' => 'APPROVED']);
        $bad = create(\App\Event::class, ['codeweek_for_all_participation_code' => 'cw22-bad', 'status' => 'APPROVED']);

        $this->post('search', ['tag' => 'cw22-foobar'])
            ->assertSee($good->title)
            ->assertDontSee($bad->title);

    }
}
