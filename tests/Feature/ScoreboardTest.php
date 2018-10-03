<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScoreboardTest extends TestCase
{

    use DatabaseMigrations;



    /** @test */
    public function scoreboard_should_show_upcoming_events()
    {
        $belgium = create('App\Country', ['iso'=>'BE','name'=>'Belgium']);
        $luxembourg = create('App\Country', ['iso'=>'LU','name'=>'Luxembourg']);
        $eventsInBelgium = create('App\Event', ['country_iso'=>'BE','end_date'=>Carbon::tomorrow(), 'status'=>'APPROVED'],7);
        $eventsInLuxembourg = create('App\Event', ['country_iso'=>'LU','end_date'=>Carbon::now()->subYear(1),'status'=>'APPROVED'],1);

        $this->get('scoreboard')
            ->assertSee('Belgium')
            ->assertSee('7');

        $this->get('scoreboard')
            ->assertDontSee('Luxembourg');


    }
}
