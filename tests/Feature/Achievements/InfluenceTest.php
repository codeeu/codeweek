<?php

namespace Tests\Feature\Achievements\Achievements;

use PHPUnit\Framework\Attributes\Test;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Event;
use Tests\TestCase;

class InfluenceTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_influence_should_be_counted(): void
    {

        $user = \App\User::factory()->create();

        $LT1 = \App\User::factory()->create(['id' => 100, 'tag' => 'BE-TESTME-123']);

        $events2020 = \App\Event::factory()->count(10)->create(['leading_teacher_tag' => 'BE-TESTME-123', 'status' => 'APPROVED', 'creator_id' => $user->id, 'reported_at' => null, 'created_at' => Carbon::now()->setYear(2020)]);
        $events2021 = \App\Event::factory()->count(20)->create(['leading_teacher_tag' => 'BE-TESTME-123', 'status' => 'APPROVED', 'creator_id' => $user->id, 'reported_at' => null, 'created_at' => Carbon::now()->setYear(2021)]);

        $InfluenceCount2020 = $LT1->influence(2020);
        $InfluenceCount2021 = $LT1->influence(2021);

        $this->assertEquals(20, $InfluenceCount2020);
        $this->assertEquals(40, $InfluenceCount2021);

    }

    // When we create an event with a LT tag, the experience is taken into account

    #[Test]
    public function leading_teacher_receives_experience_when_event_is_approved(): void
    {

        //        $tag = create('App\Tag', ['name' => 'TI-testme-234']);

        $leading_teacher = \App\User::factory()->create(['tag' => 'IT-TESTME-123']);

        $event = \App\Event::factory()->create([
            'status' => 'PENDING',
            'leading_teacher_tag' => 'IT-TESTME-123',
            'created_at' => Carbon::now()->setYear(2022),
        ]);

        $this->assertEquals(0, $leading_teacher->influence(2022));

        $event->update(['status' => 'APPROVED']);

        $this->assertEquals(2, $leading_teacher->fresh()->influence(2022));

    }
}
