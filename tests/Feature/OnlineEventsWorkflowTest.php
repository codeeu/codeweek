<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OnlineEventsWorkflowTest extends TestCase
{

    use DatabaseMigrations;

    /*
     * 2 steps: PROMOTED and FEATURED
     */

    /*
     * admins should receive an email when event is promoted
     */

    /** @test */
    public function it_should_not_list_online_events_for_unauthenticated_users()
    {
        $response = $this->get('/online/list');

        $response->assertStatus(403);
    }

    /*
     * online events only
     * ambassadors only see online events from their own countries
     */
    /** @test */
    public function it_should_list_online_events_for_ambassadors()
    {
        $this->seed('RolesAndPermissionsSeeder');


        $ambassador = create('App\User');
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $onlineEventInCountry = create('App\Event', ['start_date' => Carbon::now()->addDay(), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $pastOnlineEventInCountry = create('App\Event', ['start_date' => Carbon::now()->subDay(), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $onlineEventInAnotherCountry = create('App\Event', ['start_date' => Carbon::now()->addDay(), 'country_iso' => 'foobar', 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $offlineEventInCountry = create('App\Event', ['start_date' => Carbon::now()->addDay(), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'offline']);

        $response = $this->get('/online/list')
            ->assertSee($onlineEventInCountry->title)
            ->assertDontSee($onlineEventInAnotherCountry->title)
            ->assertDontSee($pastOnlineEventInCountry->title)
            ->assertDontSee($offlineEventInCountry->title);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_should_list_all_online_events_for_admins()
    {
        $this->seed('RolesAndPermissionsSeeder');


        $superadmin = create('App\User');
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $belgium = create('App\Country', ['iso' => 'BE']);
        $france = create('App\Country', ['iso' => 'FR']);

        $onlineEventInCountry = create('App\Event', ['start_date' => Carbon::now()->addDay(),'country_iso' => $belgium->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $onlineEventInAnotherCountry = create('App\Event', ['start_date' => Carbon::now()->addDay(),'country_iso' => $france->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $offlineEventInCountry = create('App\Event', ['start_date' => Carbon::now()->addDay(),'country_iso' => $belgium->iso, 'status' => 'APPROVED', 'activity_type' => 'offline']);

        $response = $this->get('/online/list')
            ->assertSee($onlineEventInCountry->title)
            ->assertSee($onlineEventInAnotherCountry->title)
            ->assertDontSee($offlineEventInCountry->title);

    }

    /** @test */
    public function ambassadors_can_promote_events_from_their_countries()
    {
        $this->seed('RolesAndPermissionsSeeder');


        $ambassador = create('App\User');
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $onlineEventInCountry = create('App\Event', ['start_date' => Carbon::now()->addDay(), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);

        $onlineEventInCountry->promote();

        $this->assertEquals('PROMOTED', $onlineEventInCountry->fresh()->highlighted_status);

    }

    /** @test */
    public function visitors_cannot_promote_events()
    {
        $this->seed('RolesAndPermissionsSeeder');

        $user = create('App\User');

        $this->signIn($user);

        $onlineEventInCountry = create('App\Event', ['start_date' => Carbon::now()->addDay(), 'country_iso' => $user->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);

        $onlineEventInCountry->promote();

        $this->assertEquals('NONE', $onlineEventInCountry->fresh()->highlighted_status);

    }

    /** @test */
    public function ambassadors_cannot_feature_events()
    {
        $this->seed('RolesAndPermissionsSeeder');


        $ambassador = create('App\User');
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $onlineEventInCountry = create('App\Event', ['start_date' => Carbon::now()->addDay(), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);

        $onlineEventInCountry->feature();

        $this->assertNotEquals('FEATURED', $onlineEventInCountry->fresh()->highlighted_status);

    }

    /** @test */
    public function promoted_event_creates_notification_for_administrators()
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = create('App\User');
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $onlineEventInCountry = create('App\Event', ['start_date' => Carbon::now()->addDay(), 'country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'activity_type' => 'open-online']);
        $this->assertDatabaseCount('notifications',0);

        $onlineEventInCountry->promote();

        $this->assertDatabaseCount('notifications',1);

        $this->assertNotNull($onlineEventInCountry->notification->created_at);
        $this->assertNull($onlineEventInCountry->notification->sent_at);

        //We will cancel the promote
        $onlineEventInCountry->promote();

        $this->assertDatabaseCount('notifications',0);

    }


}
