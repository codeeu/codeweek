<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MeetCodeLinkUsersTest extends TestCase
{

    use DatabaseMigrations;


    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function it_should_link_activity_to_user()
    {
        //We got a user
        $user = create('App\User');
        $technical_user = create('App\User');

        //We got activity imported from Meet&Code
        $event = create('App\Event', ["creator_id" => $technical_user->id, "user_email" => $user->email, "event_url" => "https://meet-and-code.org/1"]);

        $this->assertCount(1, $technical_user->events);
        $this->assertCount(0, $user->events);

        //When we run the command, the activity should belong to the user
        $this->artisan('meetandcode:users');

        $this->assertCount(0, $technical_user->fresh()->events);
        $this->assertCount(1, $user->fresh()->events);
    }
}
