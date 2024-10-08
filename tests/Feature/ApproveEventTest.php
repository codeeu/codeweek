<?php

namespace Tests\Feature;

use App\Mail\EventApproved;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class ApproveEventTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');

    }

    #[Test]
    public function event_can_be_approved_by_admin(): void
    {

        Mail::fake();

        $this->withExceptionHandling();

        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = \App\Event::factory()->create(['status' => 'PENDING']);

        $this->assertEquals($event->fresh()->status, 'PENDING');

        $this->post(route('event.approve', $event));

        $this->assertEquals($event->fresh()->status, 'APPROVED');
        $this->assertEquals($superadmin->id, $event->fresh()->approved_by);

    }

    #[Test]
    public function email_should_be_sent_to_event_email_when_event_is_approved(): void
    {

        $this->withExceptionHandling();

        Mail::fake();

        $superadmin = \App\User::factory()->create();
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = \App\Event::factory()->create(['status' => 'PENDING', 'user_email' => 'foo@bar.com']);

        $event->approve();

        // Assert a message was sent to the given users...
        Mail::assertQueued(EventApproved::class, function ($mail) use ($event) {
            return $mail->hasTo($event->user_email);
        });

    }

    #[Test]
    public function email_should_be_sent_to_creator_email_when_event_email_is_blank(): void
    {

        $this->withExceptionHandling();

        Mail::fake();

        $superadmin = \App\User::factory()->create(['email' => 'test@boo.com']);
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = \App\Event::factory()->create(['status' => 'PENDING', 'user_email' => '', 'creator_id' => $superadmin->id]);

        $event->approve();

        // Assert a message was sent to the given users...
        Mail::assertQueued(EventApproved::class, function ($mail) use ($superadmin) {

            return $mail->hasTo($superadmin->email);
        });

    }

    #[Test]
    public function email_should_not_be_sent_to_creator_email(): void
    {

        $this->withExceptionHandling();

        Mail::fake();

        $superadmin = \App\User::factory()->create(['email' => null]);
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = \App\Event::factory()->create(['status' => 'PENDING', 'user_email' => '', 'creator_id' => $superadmin->id]);

        $event->approve();

        // Assert a message was sent to the given users...
        Mail::assertNotQueued(EventApproved::class);

    }

    #[Test]
    public function event_cant_be_approved_by_ambassador_of_other_country(): void
    {

        $this->withExceptionHandling();

        $ambassador = \App\User::factory()->create(['country_iso' => 'FR']);
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $event = \App\Event::factory()->create(['status' => 'PENDING', 'country_iso' => 'BE']);

        $this->assertEquals($event->fresh()->status, 'PENDING');

        $this->post(route('event.approve', $event))->assertStatus(403);

        //$this->assertEquals($event->fresh()->status, 'PENDING');

    }

    #[Test]
    public function event_can_be_approved_by_ambassador_of_same_country(): void
    {

        $this->withExceptionHandling();

        Mail::fake();

        $ambassador = \App\User::factory()->create(['country_iso' => 'FR']);
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $event = \App\Event::factory()->create(['status' => 'PENDING', 'country_iso' => 'FR']);

        $this->assertEquals($event->fresh()->status, 'PENDING');

        $this->post(route('event.approve', $event));

        $this->assertEquals($event->fresh()->status, 'APPROVED');

    }

    #[Test]
    public function visitors_cant_see_the_approve_banner(): void
    {

        $event = \App\Event::factory()->create();

        $this->get('/view/'.$event->id.'/random')
            ->assertDontSee('moderate-event');

    }

    #[Test]
    public function ambassadors_of_other_countries_cant_see_the_approve_banner(): void
    {
        $ambassador = \App\User::factory()->create(['country_iso' => 'FR'])->assignRole('ambassador');
        $this->signIn($ambassador);

        $event = \App\Event::factory()->create(['country_iso' => 'BE']);

        $this->get('/view/'.$event->id.'/random')
            ->assertDontSee('moderate-event');

    }

    #[Test]
    public function ambassadors_of_right_country_can_see_the_approve_banner(): void
    {
        $ambassador = \App\User::factory()->create(['country_iso' => 'FR'])->assignRole('ambassador');
        $this->signIn($ambassador);

        $event = \App\Event::factory()->create(['country_iso' => 'FR']);

        $this->get('/view/'.$event->id.'/random')
            ->assertSee('moderate-event');

    }
}
