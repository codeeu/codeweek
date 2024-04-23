<?php

namespace Tests\Feature\Achievements\Achievements;

use App\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagImpactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function tag_impact_badge_should_be_awarded()
    {

        $this->signIn();

        $this->seed('RolesAndPermissionsSeeder');

        $user = auth()->user();

        $LT1 = create('App\User', ['tag' => 'foo-TEST123-bar']);

        $fifty_events = create('App\Event', ['status' => 'PENDING', 'creator_id' => $user->id, 'reported_at' => null, 'leading_teacher_tag' => 'foo-TEST123-bar'], 50);

        $this->assertCount(0, $user->achievements);

        foreach ($fifty_events as $event) {
            $event->update([
                'status' => 'APPROVED',
            ]);
        }

        $this->assertEquals(100, $LT1->getExperience()->points);

        $this->assertCount(5, $LT1->fresh()->achievements);

        $this->assertEquals('Influencer '.Carbon::now()->year, $LT1->fresh()->achievements[0]->name);

    }

    /** @test */
    public function tag_impact_badge_should_be_removed_when_activity_is_rejected()
    {

        $this->signIn();

        $this->seed('RolesAndPermissionsSeeder');

        $user = auth()->user();

        $LT1 = create('App\User', ['tag' => 'foo-TEST123-bar']);

        $ten_events = create('App\Event', ['status' => 'PENDING', 'creator_id' => $user->id, 'reported_at' => null, 'leading_teacher_tag' => 'foo-TEST123-bar'], 5);

        $this->assertCount(0, $user->achievements);

        foreach ($ten_events as $event) {
            $event->update([
                'status' => 'APPROVED',
            ]);
        }

        $this->assertEquals(10, $LT1->getExperience()->points);

        $this->assertCount(1, $LT1->fresh()->achievements);

        $bad_event = Event::firstWhere('id', '=', 3);

        $bad_event->update([
            'status' => 'PENDING',
        ]);

        $this->assertEquals(8, $LT1->fresh()->getExperience()->points);

        $this->assertCount(0, $LT1->fresh()->achievements);

    }
}
