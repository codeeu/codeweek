<?php

namespace Tests\Feature;

use App\Helpers\EventHelper;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PendingEventsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function ambassador_can_see_pending_events_for_his_country(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = \App\User::factory()->create();
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $eventPendingInCountry = \App\Event::factory()->create(['country_iso' => $ambassador->country->iso, 'status' => 'PENDING', 'title' => 'foobar title 1']);
        $eventPendingInAnotherCountry = \App\Event::factory()->create(['country_iso' => \App\Country::factory()->create()->iso, 'status' => 'PENDING', 'title' => 'foobar title 2']);
        $eventApprovedInCountry = \App\Event::factory()->create(['country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'title' => 'foobar title 3']);

        $this->get('/pending')
            ->assertSee($eventPendingInCountry->title)
            ->assertDontSee($eventApprovedInCountry->title)
            ->assertDontSee($eventPendingInAnotherCountry->title);

    }

    /** @test */
    public function admin_can_see_pending_events_for_all_countries(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $eventPendingInCountry = \App\Event::factory()->create(['country_iso' => $superadmin->country->iso, 'status' => 'PENDING']);
        $eventPendingInAnotherCountry = \App\Event::factory()->create(['country_iso' => \App\Country::factory()->create()->iso, 'status' => 'PENDING']);
        $eventApprovedInCountry = \App\Event::factory()->create(['country_iso' => $superadmin->country->iso, 'status' => 'APPROVED']);

        $this->get('/pending')
            ->assertSee($eventPendingInCountry->title)
            ->assertDontSee($eventApprovedInCountry->title)
            ->assertSee($eventPendingInAnotherCountry->title);

    }

    /** @test */
    public function it_should_get_pending_events_for_ambassador_country(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = \App\User::factory()->create();
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $eventsPendingInCountry = \App\Event::factory()->count(4)->create(['country_iso' => $ambassador->country->iso, 'status' => 'PENDING']);
        $eventPendingInAnotherCountry = \App\Event::factory()->create(['country_iso' => \App\Country::factory()->create()->iso, 'status' => 'PENDING', 'title' => 'foobar title 2']);
        $eventApprovedInCountry = \App\Event::factory()->create(['country_iso' => $ambassador->country->iso, 'status' => 'APPROVED', 'title' => 'foobar title 3']);

        $this->assertCount(4, EventHelper::getPendingEvents($ambassador->country->iso));

        $this->assertEquals(4, EventHelper::getPendingEventsCount($ambassador->country->iso));

    }

    /** @test */
    public function it_should_get_all_pending_events_for_super_admin(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $eventsPendingInCountry = \App\Event::factory()->count(6)->create(['country_iso' => $superadmin->country->iso, 'status' => 'PENDING']);
        $eventPendingInAnotherCountry = \App\Event::factory()->count(4)->create(['country_iso' => \App\Country::factory()->create()->iso, 'status' => 'PENDING']);
        $eventApprovedInCountry = \App\Event::factory()->create(['country_iso' => $superadmin->country->iso, 'status' => 'APPROVED', 'title' => 'foobar title 3']);

        $this->assertCount(10, EventHelper::getPendingEvents());

        $this->assertEquals(10, EventHelper::getPendingEventsCount());

    }

    /** @test */
    public function admin_can_see_pending_event_by_country(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $belgium = \App\Country::factory()->create(['iso' => 'BE']);
        $france = \App\Country::factory()->create(['iso' => 'FR']);
        //Given that we select a country
        $eventInBelgium = \App\Event::factory()->create(['country_iso' => $belgium->iso, 'status' => 'PENDING']);
        $eventNotInBelgium = \App\Event::factory()->create(['country_iso' => $france->iso, 'status' => 'PENDING']);

        $this->get('/pending/BE')
            ->assertSee($eventInBelgium->title)
            ->assertDontSee($eventNotInBelgium->title);

    }

    /** @test */
    public function it_should_get_next_pending_event_id(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $eventsPendingInCountry = \App\Event::factory()->count(10)->create(['country_iso' => $superadmin->country->iso, 'status' => 'PENDING']);

        $this->assertEquals($eventsPendingInCountry[1]->id, EventHelper::getNextPendingEvent($eventsPendingInCountry[0])->id ?? null);

    }

    /** @test */
    public function it_should_get_next_pending_event_for_ambassador(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = \App\User::factory()->create();
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $event1 = \App\Event::factory()->create(['country_iso' => $ambassador->country->iso, 'status' => 'PENDING', 'id' => 100]);
        $event2 = \App\Event::factory()->create(['country_iso' => 'foobar', 'status' => 'PENDING', 'id' => 200]);
        $event3 = \App\Event::factory()->create(['country_iso' => $ambassador->country->iso, 'status' => 'PENDING', 'id' => 300]);

        $this->assertEquals(300, auth()->user()->getNextPendingEvent($event1)->id);

    }

    /** @test */
    public function it_should_get_next_pending_event_as_null_for_last_event(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $eventsPendingInCountry = \App\Event::factory()->count(10)->create(['country_iso' => $superadmin->country->iso, 'status' => 'PENDING']);

        $this->assertNull(EventHelper::getNextPendingEvent($eventsPendingInCountry[9])->id ?? null);

    }

    /** @test */
    public function it_should_get_next_pending_event_as_not_null_for_last_event_if_there_are_more_events(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        $ambassador = \App\User::factory()->create();
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $event1 = \App\Event::factory()->create(['country_iso' => $ambassador->country->iso, 'status' => 'PENDING', 'id' => 100]);
        $event2 = \App\Event::factory()->create(['country_iso' => 'foobar', 'status' => 'PENDING', 'id' => 200]);
        $event3 = \App\Event::factory()->create(['country_iso' => $ambassador->country->iso, 'status' => 'PENDING', 'id' => 300]);

        $this->assertEquals(100, auth()->user()->getNextPendingEvent($event3)->id);

    }
}
