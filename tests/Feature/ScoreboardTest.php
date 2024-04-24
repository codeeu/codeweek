<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ScoreboardTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function scoreboard_should_show_upcoming_events()
    {
        $belgium = create('App\Country', ['iso' => 'BE', 'name' => 'Belgium']);
        $luxembourg = create('App\Country', ['iso' => 'LU', 'name' => 'Luxembourg']);
        $eventsInBelgium = create('App\Event', ['country_iso' => 'BE', 'end_date' => Carbon::tomorrow(), 'status' => 'APPROVED'], 7);
        $eventsInLuxembourg = create('App\Event', ['country_iso' => 'LU', 'end_date' => Carbon::now()->subYear(1), 'status' => 'APPROVED'], 1);

        $this->get('scoreboard')
            ->assertSee('Belgium')
            ->assertSee('7');

        $this->get('scoreboard')
            ->assertDontSee('Luxembourg');

    }

    /** @test */
    public function scoreboard_should_not_count_dependencies()
    {
        $belgium = create('App\Country', ['iso' => 'BE', 'name' => 'Belgium', 'population' => 1000]);
        $france = create('App\Country', ['iso' => 'FR', 'name' => 'France', 'population' => 1000]);
        $guadeloupe = create('App\Country', ['iso' => 'GP', 'name' => 'Guadeloupe', 'parent' => 'FR', 'population' => 1000]);
        $martinique = create('App\Country', ['iso' => 'MQ', 'name' => 'Martinique', 'parent' => 'FR', 'population' => 1000]);

        $eventsInBelgium = create('App\Event', ['country_iso' => 'BE', 'start_date' => Carbon::tomorrow(), 'status' => 'APPROVED'], 10);
        $eventsInFrance = create('App\Event', ['country_iso' => 'FR', 'start_date' => Carbon::tomorrow(), 'status' => 'APPROVED'], 10);
        $eventsInGuadeloupe = create('App\Event', ['country_iso' => 'GP', 'start_date' => Carbon::tomorrow(), 'status' => 'APPROVED'], 20);
        $eventsInMartinique = create('App\Event', ['country_iso' => 'MQ', 'start_date' => Carbon::tomorrow(), 'status' => 'APPROVED'], 30);

        $this->get('scoreboard')
            ->assertSee('Belgium')
            ->assertSee('10');

        $this->get('scoreboard')
            ->assertSee('France')
            ->assertSee('60');

        $this->get('scoreboard')
            ->assertDontSee('Guadeloupe')
            ->assertDontSee('Martinique')
            ->assertSee('70');

    }
}
