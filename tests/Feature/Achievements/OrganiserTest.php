<?php

namespace Tests\Feature\Achievements\Achievements;

use App\Achievements\Events\UserEarnedExperience;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class OrganiserTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function user_should_get_reported_events_linked()
    {


        $user = create('App\User');
        create('App\Event', [
            'creator_id' => $user->id,
            'created_at' => Carbon::now()->setYear(2020),
            'status' => 'APPROVED',
            'reported_at' => Carbon::now()->setYear(2020),
        ],12);

        create('App\Event', [
            'creator_id' => $user->id,
            'created_at' => Carbon::now()->setYear(2021),
            'status' => 'APPROVED',
            'reported_at' => Carbon::now()->setYear(2021),
        ],4);

        $reportedEventsCount2020 = $user->reported(2020);
        $reportedEventsCount2021 = $user->reported(2021);

        $this->assertEquals(12, $reportedEventsCount2020);
        $this->assertEquals(4, $reportedEventsCount2021);



    }


}
