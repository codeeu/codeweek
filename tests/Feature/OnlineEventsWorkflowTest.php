<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
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
