<?php

namespace Tests\Feature;

use App\Mail\NotifyAdministrator;
use App\Mail\RemindCreator;
use App\Notification;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class NotifyAdministratorsTest extends TestCase
{

    use DatabaseMigrations;

    public function setup() :void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');


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

        $this->assertEquals(3, Notification::whereNull('sent_at')->count());

        //If we haven't notified the administrators about this event, we send an email
        $this->artisan('notify:administrators');

        Mail::assertQueued(NotifyAdministrator::class, 2);

        $this->assertEquals(0, Notification::whereNull('sent_at')->count());


    }
}
