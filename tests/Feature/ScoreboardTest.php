<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ScoreboardTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function scoreboard_should_show_upcoming_events(): void
    {
        $belgium = \App\Country::factory()->create(['iso' => 'BE', 'name' => 'Belgium']);
        $luxembourg = \App\Country::factory()->create(['iso' => 'LU', 'name' => 'Luxembourg']);
        $eventsInBelgium = \App\Event::factory()->count(7)->create(['country_iso' => 'BE', 'end_date' => Carbon::tomorrow(), 'status' => 'APPROVED']);
        $eventsInLuxembourg = \App\Event::factory()->count(1)->create(['country_iso' => 'LU', 'end_date' => Carbon::now()->subYear(1), 'status' => 'APPROVED']);

        $this->get('scoreboard')
            ->assertSee('Belgium')
            ->assertSee('7');

        $this->get('scoreboard')
            ->assertDontSee('Luxembourg');

    }

    #[Test]
    public function scoreboard_should_not_count_dependencies(): void
    {
        $belgium = \App\Country::factory()->create(['iso' => 'BE', 'name' => 'Belgium', 'population' => 1000]);
        $france = \App\Country::factory()->create(['iso' => 'FR', 'name' => 'France', 'population' => 1000]);
        $guadeloupe = \App\Country::factory()->create(['iso' => 'GP', 'name' => 'Guadeloupe', 'parent' => 'FR', 'population' => 1000]);
        $martinique = \App\Country::factory()->create(['iso' => 'MQ', 'name' => 'Martinique', 'parent' => 'FR', 'population' => 1000]);

        $eventsInBelgium = \App\Event::factory()->count(10)->create(['country_iso' => 'BE', 'start_date' => Carbon::tomorrow(), 'status' => 'APPROVED']);
        $eventsInFrance = \App\Event::factory()->count(10)->create(['country_iso' => 'FR', 'start_date' => Carbon::tomorrow(), 'status' => 'APPROVED']);
        $eventsInGuadeloupe = \App\Event::factory()->count(20)->create(['country_iso' => 'GP', 'start_date' => Carbon::tomorrow(), 'status' => 'APPROVED']);
        $eventsInMartinique = \App\Event::factory()->count(30)->create(['country_iso' => 'MQ', 'start_date' => Carbon::tomorrow(), 'status' => 'APPROVED']);

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
