<?php

namespace Tests\Feature;

use App\Mail\NotifySuperOrganiser;
use App\Mail\NotifyWinner;
use App\Queries\SuperOrganiserQuery;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class SuperOrganisersTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $user1 = \App\User::factory()->create();
        $user2 = \App\User::factory()->create();
        $user3 = \App\User::factory()->create();

        \App\Event::factory()->count(22)->create(['creator_id' => $user1->id, 'status' => 'APPROVED', 'end_date' => Carbon::now()]);
        \App\Event::factory()->count(28)->create(['creator_id' => $user1->id, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subYear()]);
        \App\Event::factory()->count(8)->create(['creator_id' => $user2->id, 'status' => 'APPROVED', 'end_date' => Carbon::now()]);
        \App\Event::factory()->count(33)->create(['creator_id' => $user3->id, 'status' => 'APPROVED', 'end_date' => Carbon::now()]);

    }

    #[Test]
    public function it_should_get_super_organiser_winners(): void
    {

        $winners = SuperOrganiserQuery::winners(Carbon::now()->year);

        $this->assertEquals([1, 3], $winners);

    }

    #[Test]
    public function notify_winners_for_specific_edition(): void
    {
        $this->withExceptionHandling();

        Mail::fake();

        // We create two users

        $userA = \App\User::factory()->create();
        $userB = \App\User::factory()->create();
        $userC = \App\User::factory()->create();

        // A winner and a loser for specific edition
        \App\Excellence::factory()->create(['edition' => Carbon::now()->year, 'user_id' => $userA->id, 'type' => 'Excellence']);
        \App\Excellence::factory()->create(['edition' => Carbon::now()->year, 'user_id' => $userA->id, 'type' => 'SuperOrganiser']);
        \App\Excellence::factory()->create(['edition' => Carbon::now()->subYear()->year, 'user_id' => $userA->id, 'type' => 'SuperOrganiser']);
        \App\Excellence::factory()->create(['edition' => Carbon::now()->year, 'user_id' => $userB->id, 'type' => 'SuperOrganiser']);
        \App\Excellence::factory()->create(['edition' => Carbon::now()->year, 'user_id' => $userC->id, 'type' => 'SuperOrganiser', 'notified_at' => \Carbon\Carbon::now()]);

        // We send the email
        $this->artisan('notify:superorganisers', ['edition' => Carbon::now()->year]);

        // Only super organisers mails should be sent
        Mail::assertQueued(NotifySuperOrganiser::class, 2);
        Mail::assertQueued(NotifyWinner::class, 0);

        // We send the email
        $this->artisan('notify:superorganisers', ['edition' => Carbon::now()->year]);
        $this->artisan('notify:superorganisers', ['edition' => Carbon::now()->year]);
        $this->artisan('notify:superorganisers', ['edition' => Carbon::now()->year]);
        $this->artisan('notify:superorganisers', ['edition' => Carbon::now()->year]);
        Mail::assertQueued(NotifySuperOrganiser::class, 2);

    }

    #[Test]
    public function notified_organisers_should_be_flagged_as_notified_with_no_interference(): void
    {
        $this->withExceptionHandling();

        Mail::fake();

        // We create the user

        $userA = \App\User::factory()->create();

        // A winner and a loser for specific edition
        \App\Excellence::factory()->create(['edition' => Carbon::now()->year, 'user_id' => $userA->id, 'type' => 'SuperOrganiser']);
        \App\Excellence::factory()->create(['edition' => Carbon::now()->year, 'user_id' => $userA->id, 'type' => 'Excellence']);

        $this->assertCount(1, $userA->superOrganisers->whereNull('notified_at'));
        $this->assertCount(1, $userA->excellences->whereNull('notified_at'));

        // We send the email
        $this->artisan('notify:superorganisers', ['edition' => Carbon::now()->year]);

        $this->assertCount(0, $userA->superOrganisers->fresh()->whereNull('notified_at'));
        $this->assertCount(1, $userA->excellences->whereNull('notified_at'));

    }
}
