<?php

namespace Tests\Feature;

use App\Event;
use App\Livewire\OnlineCalendar;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OnlineActivitiesFilterPaginationTest extends TestCase
{
    use RefreshDatabase;

    private function makeActivity(string $title, array $languages): Event
    {
        return Event::factory()->create([
            'start_date' => Carbon::now()->addWeek(),
            'end_date' => Carbon::now()->addWeek()->addDay(),
            'status' => 'APPROVED',
            'activity_type' => 'open-online',
            'highlighted_status' => 'NONE',
            'language' => $languages,
            'title' => $title,
        ]);
    }

    /**
     * Reported by the ambassadors: pick a language, walk to page two and the list is
     * back to every language, because the page link is an ordinary browser navigation
     * and the chosen filter never reached the URL.
     */
    #[Test]
    public function the_language_filter_survives_a_jump_to_the_second_page(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        // 25 English activities push the English-only list onto a second page.
        for ($i = 1; $i <= 25; $i++) {
            $this->makeActivity('English Activity Number '.$i, ['en']);
        }

        $german = $this->makeActivity('German Only Activity', ['de']);

        $this->get('/online-activities?language=en&page=2')
            ->assertStatus(200)
            ->assertDontSee($german->title);
    }

    #[Test]
    public function the_month_filter_survives_a_jump_to_the_second_page(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $nextMonth = Carbon::now()->addMonthNoOverflow()->startOfMonth();

        for ($i = 1; $i <= 25; $i++) {
            Event::factory()->create([
                'start_date' => $nextMonth->copy()->addDays(2),
                'end_date' => $nextMonth->copy()->addDays(3),
                'status' => 'APPROVED',
                'activity_type' => 'open-online',
                'highlighted_status' => 'NONE',
                'language' => ['en'],
                'title' => 'Next Month Activity Number '.$i,
            ]);
        }

        $thisWeek = $this->makeActivity('Happening This Week Activity', ['en']);

        $month = $nextMonth->month.'/'.$nextMonth->year;

        $this->get('/online-activities?month='.urlencode($month).'&page=2')
            ->assertStatus(200)
            ->assertSee('for '.$nextMonth->format('F Y'))
            ->assertDontSee($thisWeek->title);
    }

    #[Test]
    public function pagination_links_carry_the_active_filters(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        for ($i = 1; $i <= 25; $i++) {
            $this->makeActivity('English Activity Number '.$i, ['en']);
        }

        $html = $this->get('/online-activities?language=en')->getContent();

        $this->assertMatchesRegularExpression(
            '/href="[^"]*page=2[^"]*language=en|href="[^"]*language=en[^"]*page=2/',
            $html,
            'The link to page two must keep the chosen language.'
        );
    }

    /**
     * The order the ambassadors hit it in: pick the language from the dropdown, which is
     * a Livewire round trip, then click page two, which is a browser navigation.
     */
    #[Test]
    public function choosing_a_language_then_paginating_keeps_the_language(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        for ($i = 1; $i <= 25; $i++) {
            $this->makeActivity('English Activity Number '.$i, ['en']);
        }

        $german = $this->makeActivity('German Only Activity', ['de']);

        $html = Livewire::test(OnlineCalendar::class)
            ->set('selectedLanguage', 'en')
            ->html();

        preg_match('/href="([^"]*page=2[^"]*)"/', $html, $matches);

        $this->assertNotEmpty($matches, 'A link to page two should be rendered.');

        $this->get($matches[1])
            ->assertStatus(200)
            ->assertDontSee($german->title);
    }

    #[Test]
    public function the_dropdowns_show_the_filter_that_is_in_force(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $this->makeActivity('English Activity', ['en']);
        $this->makeActivity('German Activity', ['de']);

        $this->get('/online-activities?language=en')
            ->assertStatus(200)
            ->assertSee('<option value="en" selected>English</option>', false);
    }

    #[Test]
    public function the_filters_are_read_from_the_query_string(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $this->makeActivity('English Activity', ['en']);

        Livewire::withQueryParams(['language' => 'en'])
            ->test(OnlineCalendar::class)
            ->assertSet('selectedLanguage', 'en');
    }
}
