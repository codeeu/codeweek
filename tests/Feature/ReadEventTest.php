<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadEventTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function a_user_can_filter_events_by_any_username()
    {
        $this->signIn(create('App\User'));

        $threadByJohn = create('App\Event', ['creator_id' => auth()->id()]);
        $threadNotByJohn = create('App\Event');

        $this->get('/my')
            ->assertSee($threadByJohn->title)
            ->assertDontSee($threadNotByJohn->title);
    }


}


