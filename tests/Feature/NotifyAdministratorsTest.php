<?php

namespace Tests\Feature;

use App\Mail\NotifyAdministrator;
use App\Notification;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class NotifyAdministratorsTest extends TestCase
{
    use DatabaseMigrations;

    public function setup(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('ActivitiesAdministratorRoleSeeder');

    }

    /** @test */
    public function notify_administrators_when_new_events_are_ready_to_be_added_to_the_calendar()
    {
        Mail::fake();
        //An event is created and promoted by the administrator
        create('App\Notification', [], 3);

        //Create two administrators
        $superadmin = create('App\User');
        $superadmin->assignRole('super admin');

        $superadmin2 = create('App\User');
        $superadmin2->assignRole('super admin');

        $activitiesadmin = create('App\User')->assignRole('activities admin');
        $activitiesadmin2 = create('App\User')->assignRole('activities admin');
        $activitiesadmin3 = create('App\User')->assignRole('activities admin');
        $activitiesadmin4 = create('App\User')->assignRole('activities admin');

        $this->assertEquals(3, Notification::whereNull('sent_at')->count());

        //If we haven't notified the administrators about this event, we send an email
        $this->artisan('notify:administrators');

        Mail::assertQueued(NotifyAdministrator::class, 4);

        $this->assertEquals(0, Notification::whereNull('sent_at')->count());

    }
}
