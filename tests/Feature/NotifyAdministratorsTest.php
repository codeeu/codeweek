<?php

namespace Tests\Feature;

use App\Mail\NotifyAdministrator;
use App\Notification;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class NotifyAdministratorsTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('ActivitiesAdministratorRoleSeeder');

    }

    #[Test]
    public function notify_administrators_when_new_events_are_ready_to_be_added_to_the_calendar(): void
    {
        Mail::fake();
        //An event is created and promoted by the administrator
        create(\App\Notification::class, [], 3);

        //Create two administrators
        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $superadmin2 = \App\User::factory()->create();
        $superadmin2->assignRole('super admin');

        $activitiesadmin = \App\User::factory()->create()->assignRole('activities admin');
        $activitiesadmin2 = \App\User::factory()->create()->assignRole('activities admin');
        $activitiesadmin3 = \App\User::factory()->create()->assignRole('activities admin');
        $activitiesadmin4 = \App\User::factory()->create()->assignRole('activities admin');

        $this->assertEquals(3, Notification::whereNull('sent_at')->count());

        //If we haven't notified the administrators about this event, we send an email
        $this->artisan('notify:administrators');

        Mail::assertQueued(NotifyAdministrator::class, 4);

        $this->assertEquals(0, Notification::whereNull('sent_at')->count());

    }
}
