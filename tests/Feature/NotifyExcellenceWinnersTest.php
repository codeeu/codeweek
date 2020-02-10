<?php

namespace Tests\Feature;

use App\Event;
use App\Helpers\ReminderHelper;
use App\Mail\NotifyWinner;
use App\Mail\RemindCreator;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotifyExcellenceWinnersTest extends TestCase
{

    use DatabaseMigrations;

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
        create('App\Excellence', ['edition'=>2018,'user_id'=>$userA->id]);
        create('App\Excellence', ['edition'=>2019,'user_id'=>$userA->id]);
        create('App\Excellence', ['edition'=>2019,'user_id'=>$userB->id]);
        create('App\Excellence', ['edition'=>2019,'user_id'=>$userC->id,'notified_at'=> Carbon::now()]);

        // We send the email
        $this->artisan('notify:winners',["edition"=>2019]);

        // Only one should be sent
        Mail::assertQueued(NotifyWinner::class, 2);


    }


}
