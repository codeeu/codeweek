<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class OnlineEventsWorkflowTest extends TestCase
{
    use DatabaseMigrations;

    /*
     * 2 steps: PROMOTED and FEATURED
     */

    /*
     * admins should receive an email when event is promoted
     */

    #[Test]
    public function it_should_not_list_online_events_for_unauthenticated_users(): void
    {
        $response = $this->get('/online/list');

        $response->assertStatus(403);
    }

    /*
     * online events only
     * ambassadors only see online events from their own countries
     */
    #[Test]
    public function it_should_list_online_events_for_ambassadors(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = \App\User::factory()->create();
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $onlineEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->addDay(), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $pastOnlineEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->subMonth(), 'end_date' => Carbon::now()->subDay(), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $onlineEventInAnotherCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->addDay(), 'country_iso' => 'foobar', 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $offlineEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->addDay(), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'offline']);

        $response = $this->get('/online/list')
            ->assertSee($onlineEventInCountry->title)
            ->assertDontSee($onlineEventInAnotherCountry->title)
            ->assertDontSee($pastOnlineEventInCountry->title)
            ->assertDontSee($offlineEventInCountry->title)
            ->assertSee('Promote')
            ->assertDontSee('Add to Calendar');

        $response->assertStatus(200);
    }

    /*
 * online events only
 * ambassadors only see online events from their own countries
 */
    #[Test]
    public function it_should_list_online_events_when_month_is_between_start_and_end_and_started_recently(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = \App\User::factory()->create();
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $onlineEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->subDays(15), 'end_date' => Carbon::now()->addMonths(2), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $tooOldOnlineEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->subDays(45), 'end_date' => Carbon::now()->addMonths(2), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $pastEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->subDays(10), 'end_date' => Carbon::now()->subDays(10), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);

        $response = $this->get('/online/list')
            ->assertSee($onlineEventInCountry->title)
            ->assertDontSee($tooOldOnlineEventInCountry->title)
            ->assertDontSee($pastEventInCountry->title)
            ->assertSee('Promote')
            ->assertDontSee('Add to Calendar');

        $response->assertStatus(200);
    }

    #[Test]
    public function it_should_list_all_online_events_for_admins(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $belgium = \App\Country::factory()->create(['iso' => 'BE']);
        $france = \App\Country::factory()->create(['iso' => 'FR']);

        $onlineEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->addDay(), 'country_iso' => $belgium->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $PendingOnlineEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->addDay(), 'country_iso' => $belgium->iso, 'status' => 'PENDING', 'activity_type' => 'open-online']);
        $onlineEventInAnotherCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->addDay(), 'country_iso' => $france->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $offlineEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->addDay(), 'country_iso' => $belgium->iso, 'status' => 'APPROVED', 'activity_type' => 'offline']);

        $response = $this->get('/online/list')
            ->assertSee($onlineEventInCountry->title)
            ->assertSee($onlineEventInAnotherCountry->title)
            ->assertDontSee($offlineEventInCountry->title)
            ->assertDontSee($PendingOnlineEventInCountry->title);

    }

    #[Test]
    public function ambassadors_can_promote_events_from_their_countries(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = \App\User::factory()->create();
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $onlineEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->addDay(), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);

        $onlineEventInCountry->promote();

        $this->assertEquals('PROMOTED', $onlineEventInCountry->fresh()->highlighted_status);

    }

    #[Test]
    public function visitors_cannot_promote_events(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $user = \App\User::factory()->create();

        $this->signIn($user);

        $onlineEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->addDay(), 'country_iso' => $user->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);

        $onlineEventInCountry->promote();

        $this->assertEquals('NONE', $onlineEventInCountry->fresh()->highlighted_status);

    }

    #[Test]
    public function ambassadors_cannot_feature_events(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = \App\User::factory()->create();
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $onlineEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->addDay(), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);

        $onlineEventInCountry->feature();

        $this->assertNotEquals('FEATURED', $onlineEventInCountry->fresh()->highlighted_status);

    }

    #[Test]
    public function super_admins_can_feature_events_from_the_online_list(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $onlineEvent = \App\Event::factory()->create([
            'start_date' => Carbon::now()->addDay(),
            'end_date' => Carbon::now()->addDays(2),
            'country_iso' => $superadmin->country->iso,
            'status' => 'APPROVED',
            'activity_type' => 'open-online',
            'highlighted_status' => 'NONE',
        ]);

        $response = $this->get('/online/list')
            ->assertSee($onlineEvent->title)
            ->assertSee('All Online Activities')
            ->assertSee('Accept as Featured Activity');

        $response->assertStatus(200);

        $onlineEvent->feature();

        $this->assertEquals('FEATURED', $onlineEvent->fresh()->highlighted_status);

        $this->get('/online/featured')
            ->assertSee($onlineEvent->title);
    }

    #[Test]
    public function super_admin_menu_links_to_all_online_activities(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $this->get('/')
            ->assertSee(route('admin.online-events'), false);
    }

    #[Test]
    public function online_activities_page_shows_all_upcoming_open_online_events(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $nextYear = Carbon::now()->addYear();

        $openOnlineEvent = \App\Event::factory()->create([
            'start_date' => $nextYear->copy()->startOfMonth()->addDays(5),
            'end_date' => $nextYear->copy()->startOfMonth()->addDays(6),
            'status' => 'APPROVED',
            'activity_type' => 'open-online',
            'highlighted_status' => 'NONE',
            'language' => ['en'],
            'title' => 'Open Online Test Activity XYZ',
        ]);

        $inviteOnlyEvent = \App\Event::factory()->create([
            'start_date' => $nextYear->copy()->startOfMonth()->addDays(5),
            'end_date' => $nextYear->copy()->startOfMonth()->addDays(6),
            'status' => 'APPROVED',
            'activity_type' => 'invite-online',
            'highlighted_status' => 'NONE',
            'language' => ['en'],
            'title' => 'Invite Only Should Stay Hidden',
        ]);

        $pendingEvent = \App\Event::factory()->create([
            'start_date' => $nextYear->copy()->startOfMonth()->addDays(5),
            'end_date' => $nextYear->copy()->startOfMonth()->addDays(6),
            'status' => 'PENDING',
            'activity_type' => 'open-online',
            'highlighted_status' => 'NONE',
            'language' => ['en'],
            'title' => 'Pending Open Online Hidden',
        ]);

        $this->get('/online-activities')
            ->assertStatus(200)
            ->assertSee($openOnlineEvent->title)
            ->assertDontSee($inviteOnlyEvent->title)
            ->assertDontSee($pendingEvent->title);
    }

    #[Test]
    public function online_activities_calendar_renders_outside_the_vue_root(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $html = $this->get('/online-activities')->assertStatus(200)->getContent();

        $nonVueStart = strpos($html, '<main id="non-vue"');
        $component = strpos($html, 'wire:snapshot');

        $this->assertNotFalse($nonVueStart, 'Layout should expose the non-vue region.');
        $this->assertNotFalse($component, 'Calendar component should render.');

        // Vue mounts on <main id="app"> with the runtime compiler, which clears the
        // container and rebuilds every node, stripping Livewire's event listeners.
        $this->assertGreaterThan(
            $nonVueStart,
            $component,
            'The calendar must render inside <main id="non-vue">, otherwise Vue destroys its Livewire bindings and the filters stop responding.'
        );
    }

    #[Test]
    public function online_activities_month_filter_only_shows_events_for_selected_month(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $october = Carbon::now()->addYear()->month(10)->startOfMonth();
        $november = Carbon::now()->addYear()->month(11)->startOfMonth();

        $octoberEvent = \App\Event::factory()->create([
            'start_date' => $october->copy()->addDays(5),
            'end_date' => $october->copy()->addDays(6),
            'status' => 'APPROVED',
            'activity_type' => 'open-online',
            'language' => ['de'],
            'title' => 'October Open Online Unique',
        ]);

        $novemberEvent = \App\Event::factory()->create([
            'start_date' => $november->copy()->addDays(5),
            'end_date' => $november->copy()->addDays(6),
            'status' => 'APPROVED',
            'activity_type' => 'open-online',
            'language' => ['fr'],
            'title' => 'November Open Online Unique',
        ]);

        \Livewire\Livewire::test(\App\Livewire\OnlineCalendar::class)
            ->set('selectedDate', '10/'.$october->year)
            ->assertSee($octoberEvent->title)
            ->assertDontSee($novemberEvent->title)
            ->set('selectedDate', '11/'.$november->year)
            ->assertSee($novemberEvent->title)
            ->assertDontSee($octoberEvent->title)
            ->set('selectedLanguage', 'fr')
            ->assertSee($novemberEvent->title)
            ->set('selectedLanguage', 'de')
            ->assertDontSee($novemberEvent->title);
    }

    #[Test]
    public function online_activities_page_lists_activities_already_under_way(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ongoing = \App\Event::factory()->create([
            'start_date' => Carbon::now()->subMonths(4),
            'end_date' => Carbon::now()->addMonths(6),
            'status' => 'APPROVED',
            'activity_type' => 'open-online',
            'highlighted_status' => 'NONE',
            'language' => ['en'],
            'title' => 'Still Running Open Online Activity',
        ]);

        $finished = \App\Event::factory()->create([
            'start_date' => Carbon::now()->subMonths(4),
            'end_date' => Carbon::now()->subMonth(),
            'status' => 'APPROVED',
            'activity_type' => 'open-online',
            'highlighted_status' => 'NONE',
            'language' => ['en'],
            'title' => 'Already Finished Open Online Activity',
        ]);

        $this->get('/online-activities')
            ->assertStatus(200)
            ->assertSee($ongoing->title)
            ->assertDontSee($finished->title);
    }

    #[Test]
    public function activities_already_under_way_are_listed_under_the_current_month(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $startedFourMonthsAgo = Carbon::now()->subMonths(4);

        $ongoing = \App\Event::factory()->create([
            'start_date' => $startedFourMonthsAgo,
            'end_date' => Carbon::now()->addMonths(6),
            'status' => 'APPROVED',
            'activity_type' => 'open-online',
            'highlighted_status' => 'NONE',
            'language' => ['en'],
            'title' => 'Ongoing Grouped Under Current Month',
        ]);

        $now = Carbon::now();

        \Livewire\Livewire::test(\App\Livewire\OnlineCalendar::class)
            ->set('selectedDate', $now->month.'/'.$now->year)
            ->assertSee($ongoing->title);

        $monthIds = collect(\Livewire\Livewire::test(\App\Livewire\OnlineCalendar::class)->get('months'))
            ->pluck('id');

        $this->assertContains($now->month.'/'.$now->year, $monthIds);
        $this->assertNotContains(
            $startedFourMonthsAgo->month.'/'.$startedFourMonthsAgo->year,
            $monthIds,
            'The month filter should not offer a past month just because an ongoing activity started then.'
        );
    }

    #[Test]
    public function the_old_featured_activities_url_redirects_to_online_activities(): void
    {
        $this->get('/featured-activities')
            ->assertStatus(301)
            ->assertRedirect('/online-activities');
    }

    #[Test]
    public function promoted_event_creates_notification_for_administrators(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = \App\User::factory()->create();
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $onlineEventInCountry = \App\Event::factory()->create(['start_date' => Carbon::now()->addDay(), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $this->assertDatabaseCount('notifications', 0);

        $onlineEventInCountry->promote();

        $this->assertDatabaseCount('notifications', 1);

        $this->assertNotNull($onlineEventInCountry->notification->created_at);
        $this->assertNull($onlineEventInCountry->notification->sent_at);

        //We will cancel the promote
        $onlineEventInCountry->promote();

        $this->assertDatabaseCount('notifications', 0);

    }
}
