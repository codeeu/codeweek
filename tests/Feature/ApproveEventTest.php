<?php

namespace Tests\Feature;

use App\Mail\EventApproved;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ApproveEventTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');

    }

    /** @test */
    public function event_can_be_approved_by_admin(): void
    {

        Mail::fake();

        $this->withExceptionHandling();

        $superadmin = create(\App\User::class);
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = create(\App\Event::class, ['status' => 'PENDING']);

        $this->assertEquals($event->fresh()->status, 'PENDING');

        $this->post(route('event.approve', $event));

        $this->assertEquals($event->fresh()->status, 'APPROVED');
        $this->assertEquals($superadmin->id, $event->fresh()->approved_by);

    }

    /** @test */
    public function email_should_be_sent_to_event_email_when_event_is_approved(): void
    {

        $this->withExceptionHandling();

        Mail::fake();

        $superadmin = create(\App\User::class);
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = create(\App\Event::class, ['status' => 'PENDING', 'user_email' => 'foo@bar.com']);

        $event->approve();

        // Assert a message was sent to the given users...
        Mail::assertQueued(EventApproved::class, function ($mail) use ($event) {
            return $mail->hasTo($event->user_email);
        });

    }

    /** @test */
    public function email_should_be_sent_to_creator_email_when_event_email_is_blank(): void
    {

        $this->withExceptionHandling();

        Mail::fake();

        $superadmin = create(\App\User::class, ['email' => 'test@boo.com']);
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = create(\App\Event::class, ['status' => 'PENDING', 'user_email' => '', 'creator_id' => $superadmin->id]);

        $event->approve();

        // Assert a message was sent to the given users...
        Mail::assertQueued(EventApproved::class, function ($mail) use ($superadmin) {

            return $mail->hasTo($superadmin->email);
        });

    }

    /** @test */
    public function email_should_not_be_sent_to_creator_email(): void
    {

        $this->withExceptionHandling();

        Mail::fake();

        $superadmin = create(\App\User::class, ['email' => null]);
        $superadmin->assignRole('super admin');

        $this->signIn($superadmin);

        $event = create(\App\Event::class, ['status' => 'PENDING', 'user_email' => '', 'creator_id' => $superadmin->id]);

        $event->approve();

        // Assert a message was sent to the given users...
        Mail::assertNotQueued(EventApproved::class);

    }

    /** @test */
    public function event_cant_be_approved_by_ambassador_of_other_country(): void
    {

        $this->withExceptionHandling();

        $ambassador = create(\App\User::class, ['country_iso' => 'FR']);
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $event = create(\App\Event::class, ['status' => 'PENDING', 'country_iso' => 'BE']);

        $this->assertEquals($event->fresh()->status, 'PENDING');

        $this->post(route('event.approve', $event))->assertStatus(403);

        //$this->assertEquals($event->fresh()->status, 'PENDING');

    }

    /** @test */
    public function event_can_be_approved_by_ambassador_of_same_country(): void
    {

        $this->withExceptionHandling();

        Mail::fake();

        $ambassador = create(\App\User::class, ['country_iso' => 'FR']);
        $ambassador->assignRole('ambassador');

        $this->signIn($ambassador);

        $event = create(\App\Event::class, ['status' => 'PENDING', 'country_iso' => 'FR']);

        $this->assertEquals($event->fresh()->status, 'PENDING');

        $this->post(route('event.approve', $event));

        $this->assertEquals($event->fresh()->status, 'APPROVED');

    }

    /** @test */
    public function visitors_cant_see_the_approve_banner(): void
    {

        $event = create(\App\Event::class);

        $this->get('/view/'.$event->id.'/random')
            ->assertDontSee('moderate-event');

    }

    /** @test */
    public function ambassadors_of_other_countries_cant_see_the_approve_banner(): void
    {
        $ambassador = create(\App\User::class, ['country_iso' => 'FR'])->assignRole('ambassador');
        $this->signIn($ambassador);

        $event = create(\App\Event::class, ['country_iso' => 'BE']);

        $this->get('/view/'.$event->id.'/random')
            ->assertDontSee('moderate-event');

    }

    /** @test */
    public function ambassadors_of_right_country_can_see_the_approve_banner(): void
    {
        $ambassador = create(\App\User::class, ['country_iso' => 'FR'])->assignRole('ambassador');
        $this->signIn($ambassador);

        $event = create(\App\Event::class, ['country_iso' => 'FR']);

        $this->get('/view/'.$event->id.'/random')
            ->assertSee('moderate-event');

    }
}
