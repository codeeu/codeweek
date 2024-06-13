<?php

namespace Tests\Feature;

use App\Helpers\EventHelper;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PendingEventsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function ambassador_can_see_pending_events_for_his_country()
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = create('App\User');
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $eventPendingInCountry = create('App\Event', ['country_iso' => $ambassador->country->iso, 'status' => 'PENDING', 'title' => 'foobar title 1']);
        $eventPendingInAnotherCountry = create('App\Event', ['country_iso' => create('App\Country')->iso, 'status' => 'PENDING', 'title' => 'foobar title 2']);
        $eventApprovedInCountry = create('App\Event', ['country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'title' => 'foobar title 3']);

        $this->get('/pending')
            ->assertSee($eventPendingInCountry->title)
            ->assertDontSee($eventApprovedInCountry->title)
            ->assertDontSee($eventPendingInAnotherCountry->title);

    }

    /** @test */
    public function admin_can_see_pending_events_for_all_countries()
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
    public function it_should_get_pending_events_for_ambassador_country()
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = create('App\User');
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $eventsPendingInCountry = create('App\Event', ['country_iso' => $ambassador->country->iso, 'status' => 'PENDING'], 4);
        $eventPendingInAnotherCountry = create('App\Event', ['country_iso' => create('App\Country')->iso, 'status' => 'PENDING', 'title' => 'foobar title 2']);
        $eventApprovedInCountry = create('App\Event', ['country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'title' => 'foobar title 3']);

        $this->assertCount(4, EventHelper::getPendingEvents($ambassador->country->iso));

        $this->assertEquals(4, EventHelper::getPendingEventsCount($ambassador->country->iso));

    }

    /** @test */
    public function it_should_get_all_pending_events_for_super_admin()
    {
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = create('App\User');
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $eventsPendingInCountry = create('App\Event', ['country_iso' => $superadmin->country->iso, 'status' => 'PENDING'], 6);
        $eventPendingInAnotherCountry = create('App\Event', ['country_iso' => create('App\Country')->iso, 'status' => 'PENDING'], 4);
        $eventApprovedInCountry = create('App\Event', ['country_iso' => $superadmin->country->iso, 'status' => 'APPROVED', 'title' => 'foobar title 3']);

        $this->assertCount(10, EventHelper::getPendingEvents());

        $this->assertEquals(10, EventHelper::getPendingEventsCount());

    }

    /** @test */
    public function admin_can_see_pending_event_by_country()
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

    /** @test */
    public function it_should_get_next_pending_event_id()
    {
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = create('App\User');
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $eventsPendingInCountry = create('App\Event', ['country_iso' => $superadmin->country->iso, 'status' => 'PENDING'], 10);

        $this->assertEquals($eventsPendingInCountry[1]->id, EventHelper::getNextPendingEvent($eventsPendingInCountry[0])->id ?? null);

    }

    /** @test */
    public function it_should_get_next_pending_event_for_ambassador()
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = create('App\User');
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $event1 = create('App\Event', ['country_iso' => $ambassador->country->iso, 'status' => 'PENDING', 'id' => 100]);
        $event2 = create('App\Event', ['country_iso' => 'foobar', 'status' => 'PENDING', 'id' => 200]);
        $event3 = create('App\Event', ['country_iso' => $ambassador->country->iso, 'status' => 'PENDING', 'id' => 300]);

        $this->assertEquals(300, auth()->user()->getNextPendingEvent($event1)->id);

    }

    /** @test */
    public function it_should_get_next_pending_event_as_null_for_last_event()
    {
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = create('App\User');
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $eventsPendingInCountry = create('App\Event', ['country_iso' => $superadmin->country->iso, 'status' => 'PENDING'], 10);

        $this->assertNull(EventHelper::getNextPendingEvent($eventsPendingInCountry[9])->id ?? null);

    }

    /** @test */
    public function it_should_get_next_pending_event_as_not_null_for_last_event_if_there_are_more_events()
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = create('App\User');
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $event1 = create('App\Event', ['country_iso' => $ambassador->country->iso, 'status' => 'PENDING', 'id' => 100]);
        $event2 = create('App\Event', ['country_iso' => 'foobar', 'status' => 'PENDING', 'id' => 200]);
        $event3 = create('App\Event', ['country_iso' => $ambassador->country->iso, 'status' => 'PENDING', 'id' => 300]);

        $this->assertEquals(100, auth()->user()->getNextPendingEvent($event3)->id);

    }
}
