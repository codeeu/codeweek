<?php

namespace Tests\Feature;

use App\Excellence;
use App\Mail\NotifySuperOrganiser;
use App\Mail\NotifyWinner;
use App\Queries\SuperOrganiserQuery;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SuperOrganisersTest extends TestCase
{

    use DatabaseMigrations;

    public function setup(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $user1 = create('App\User');
        $user2 = create('App\User');
        $user3 = create('App\User');

        create('App\Event', ["creator_id" => $user1->id, "status" => "APPROVED", "end_date" => Carbon::now()], 22);
        create('App\Event', ["creator_id" => $user1->id, "status" => "APPROVED", "end_date" => Carbon::now()->subYear()], 28);
        create('App\Event', ["creator_id" => $user2->id, "status" => "APPROVED", "end_date" => Carbon::now()], 8);
        create('App\Event', ["creator_id" => $user3->id, "status" => "APPROVED", "end_date" => Carbon::now()], 33);


    }

    /** @test */
    public function it_should_get_super_organiser_winners()
    {

        $winners = SuperOrganiserQuery::winners(Carbon::now()->year);

        $this->assertEquals([1, 3], $winners);

    }

    /** @test */
    public function notify_winners_for_specific_edition()
    {
        $this->withExceptionHandling();

        Mail::fake();

        // We create two users

        $userA = create('App\User');
        $userB = create('App\User');
        $userC = create('App\User');

        // A winner and a loser for specific edition
        create('App\Excellence', ['edition' => Carbon::now()->year, 'user_id' => $userA->id, 'type' => 'Excellence']);
        create('App\Excellence', ['edition' => Carbon::now()->year, 'user_id' => $userA->id, 'type' => 'SuperOrganiser']);
        create('App\Excellence', ['edition' => Carbon::now()->subYear()->year, 'user_id' => $userA->id, 'type' => 'SuperOrganiser']);
        create('App\Excellence', ['edition' => Carbon::now()->year, 'user_id' => $userB->id, 'type' => 'SuperOrganiser']);
        create('App\Excellence', ['edition' => Carbon::now()->year, 'user_id' => $userC->id, 'type' => 'SuperOrganiser', 'notified_at' => \Carbon\Carbon::now()]);

        // We send the email
        $this->artisan('notify:superorganisers', ["edition" => Carbon::now()->year]);

        // Only super organisers mails should be sent
        Mail::assertQueued(NotifySuperOrganiser::class, 2);
        Mail::assertQueued(NotifyWinner::class, 0);

        // We send the email
        $this->artisan('notify:superorganisers', ["edition" => Carbon::now()->year]);
        $this->artisan('notify:superorganisers', ["edition" => Carbon::now()->year]);
        $this->artisan('notify:superorganisers', ["edition" => Carbon::now()->year]);
        $this->artisan('notify:superorganisers', ["edition" => Carbon::now()->year]);
        Mail::assertQueued(NotifySuperOrganiser::class, 2);


    }

    /** @test */
    public function notified_organisers_should_be_flagged_as_notified_with_no_interference()
    {
        $this->withExceptionHandling();

        Mail::fake();

        // We create the user

        $userA = create('App\User');


        // A winner and a loser for specific edition
        create('App\Excellence', ['edition' => Carbon::now()->year, 'user_id' => $userA->id, 'type' => 'SuperOrganiser']);
        create('App\Excellence', ['edition' => Carbon::now()->year, 'user_id' => $userA->id, 'type' => 'Excellence']);

        $this->assertCount(1, $userA->superOrganisers->whereNull('notified_at'));
        $this->assertCount(1, $userA->excellences->whereNull('notified_at'));


        // We send the email
        $this->artisan('notify:superorganisers', ["edition" => Carbon::now()->year]);

        $this->assertCount(0, $userA->superOrganisers->fresh()->whereNull('notified_at'));
        $this->assertCount(1, $userA->excellences->whereNull('notified_at'));




    }
}
