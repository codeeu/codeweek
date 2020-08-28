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
     * ambassador should be able to promote an event
     * admins should receive an email when event is promoted
     * only admins can feature a promoted event
     * amabassadors cannot feature an activity
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
}
