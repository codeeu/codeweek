<?php

namespace Tests\Feature\Achievements\Achievements;

use App\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class TagImpactTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function tag_impact_badge_should_be_awarded(): void
    {

        $this->signIn();

        $this->seed('RolesAndPermissionsSeeder');

        $user = auth()->user();

        $LT1 = \App\User::factory()->create(['tag' => 'foo-TEST123-bar']);

        $fifty_events = \App\Event::factory()->count(50)->create(['status' => 'PENDING', 'creator_id' => $user->id, 'reported_at' => null, 'leading_teacher_tag' => 'foo-TEST123-bar']);

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

    #[Test]
    public function tag_impact_badge_should_be_removed_when_activity_is_rejected(): void
    {

        $this->signIn();

        $this->seed('RolesAndPermissionsSeeder');

        $user = auth()->user();

        $LT1 = \App\User::factory()->create(['tag' => 'foo-TEST123-bar']);

        $ten_events = \App\Event::factory()->count(5)->create(['status' => 'PENDING', 'creator_id' => $user->id, 'reported_at' => null, 'leading_teacher_tag' => 'foo-TEST123-bar']);

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
