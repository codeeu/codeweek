<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PendingEventsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function ambassador_can_see_pending_events_for_his_country()
    {
        $this->seed('RolesAndPermissionsSeeder');


        $ambassador = create('App\User');
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);


        $eventPendingInCountry = create('App\Event', ['country_iso' => $ambassador->country->iso, 'status' => 'PENDING']);
        $eventPendingInAnotherCountry = create('App\Event', ['country_iso' => create('App\Country')->iso, 'status' => 'PENDING']);
        $eventApprovedInCountry = create('App\Event', ['country_iso' => $ambassador->country->iso, 'status' => 'APPROVED']);


        $this->get('/pending')
            ->assertSee($eventPendingInCountry->title)
            ->assertDontSee($eventApprovedInCountry->title)
            ->assertDontSee($eventPendingInAnotherCountry->title);

    }

    /** @test */
    function admin_can_see_pending_events_for_all_countries()
    {
        $this->seed('RolesAndPermissionsSeeder');


        $superadmin = create('App\User');
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);


        $eventPendingInCountry = create('App\Event', ['country_iso' => $superadmin->country->iso, 'status' => 'PENDING']);
        $eventPendingInAnotherCountry = create('App\Event', ['country_iso' => create('App\Country')->iso, 'status' => 'PENDING']);
        $eventApprovedInCountry = create('App\Event', ['country_iso' => $superadmin->country->iso, 'status' => 'APPROVED']);


        $this->get('/pending')
            ->assertSee($eventPendingInCountry->title)
            ->assertDontSee($eventApprovedInCountry->title)
            ->assertSee($eventPendingInAnotherCountry->title);

    }

    /** @test */
    function admin_can_see_pending_event_by_country()
    {
        $this->seed('RolesAndPermissionsSeeder');


        $superadmin = create('App\User');
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);


        $belgium = create('App\Country', ['iso' => 'BE']);
        $france = create('App\Country', ['iso' => 'FR']);
        //Given that we select a country
        $eventInBelgium = create('App\Event', ['country_iso' => $belgium->iso, 'status' => 'PENDING']);
        $eventNotInBelgium = create('App\Event', ['country_iso' => $france->iso, 'status' => 'PENDING']);

        $this->get('/pending/BE')
            ->assertSee($eventInBelgium->title)
            ->assertDontSee($eventNotInBelgium->title);

    }


}


