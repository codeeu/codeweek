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


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $belgium = create('App\Country', ['iso'=>'BE','name'=>'Belgium']);
        $luxembourg = create('App\Country', ['iso'=>'LU','name'=>'Luxembourg']);
        $eventsInBelgium = create('App\Event', ['country'=>'BE','end_date'=>Carbon::tomorrow()],7);
        $eventsInLuxembourg = create('App\Event', ['country'=>'LU','end_date'=>Carbon::yesterday()],1);

        $this->get('scoreboard')
            ->assertSee('Belgium')
            ->assertSee('7');

        $this->get('scoreboard')
            ->assertDontSee('Luxembourg');


    }
}
