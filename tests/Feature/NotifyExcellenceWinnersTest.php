<?php

namespace Tests\Feature;

use App\Excellence;
use App\Mail\NotifyWinner;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class NotifyExcellenceWinnersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function notify_winners_for_specific_edition(): void
    {
        $this->withExceptionHandling();

        Mail::fake();

        // We create two users

        $userA = \App\User::factory()->create();
        $userB = \App\User::factory()->create();
        $userC = \App\User::factory()->create();

        // A winner and a loser for specific edition
        create(\App\Excellence::class, ['edition' => 2018, 'user_id' => $userA->id]);
        create(\App\Excellence::class, ['edition' => 2019, 'user_id' => $userA->id]);
        create(\App\Excellence::class, ['edition' => 2019, 'user_id' => $userB->id]);
        create(\App\Excellence::class, ['edition' => 2019, 'user_id' => $userC->id, 'notified_at' => Carbon::now()]);

        // We send the email
        $this->artisan('notify:winners', ['edition' => 2019]);

        // Only one should be sent
        Mail::assertQueued(NotifyWinner::class, 2);

    }

    /** @test */
    public function deleted_users_should_not_be_notified(): void
    {
        $this->withExceptionHandling();

        Mail::fake();

        // We create two users

        $userA = \App\User::factory()->create(['deleted_at' => Carbon::now()]);

        // A winner and a loser for specific edition
        create(\App\Excellence::class, ['edition' => 2018, 'user_id' => $userA->id]);

        // We send the email
        $this->artisan('notify:winners', ['edition' => 2018]);

        // Only one should be sent
        Mail::assertQueued(NotifyWinner::class, 0);
        $this->assertCount(0, Excellence::all());

    }

    /** @test */
    public function users_that_dont_receive_mails_should_not_be_notified(): void
    {
        $this->withExceptionHandling();

        Mail::fake();

        // We create two users

        $userA = \App\User::factory()->create(['receive_emails' => 0]);

        // A winner and a loser for specific edition
        create(\App\Excellence::class, ['edition' => 2018, 'user_id' => $userA->id]);

        // We send the email
        $this->artisan('notify:winners', ['edition' => 2018]);

        // Only one should be sent
        Mail::assertQueued(NotifyWinner::class, 0);

    }
}
