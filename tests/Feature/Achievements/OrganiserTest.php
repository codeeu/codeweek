<?php

namespace Tests\Feature\Achievements\Achievements;

use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrganiserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_should_get_reported_events_linked(): void
    {

        $user = \App\User::factory()->create();
        \App\Event::factory()->count(12)->create([
            'creator_id' => $user->id,
            'created_at' => Carbon::now()->setYear(2020),
            'status' => 'APPROVED',
            'reported_at' => Carbon::now()->setYear(2020),
        ]);

        \App\Event::factory()->count(4)->create([
            'creator_id' => $user->id,
            'created_at' => Carbon::now()->setYear(2021),
            'status' => 'APPROVED',
            'reported_at' => Carbon::now()->setYear(2021),
        ]);

        $reportedEventsCount2020 = $user->reported(2020);
        $reportedEventsCount2021 = $user->reported(2021);

        $this->assertEquals(12, $reportedEventsCount2020);
        $this->assertEquals(4, $reportedEventsCount2021);

    }
}
