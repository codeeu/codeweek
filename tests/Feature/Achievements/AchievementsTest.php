<?php

namespace Tests\Feature\Achievements\Achievements;

use App\Achievements\Achievement;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class AchievementsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_user_can_be_assigned_any_achievement_badge(): void
    {
        // Given we have a user
        $user = \App\User::factory()->create();

        // As well as a badge
        $achievement = factory(Achievement::class)->create();

        // If a badge is awarded to a user
        $achievement->awardTo($user);

        // Then it should be accessible through the ->achievements relationship
        $this->assertCount(1, $user->achievements);
        $this->assertTrue($user->achievements[0]->is($achievement));
    }

    #[Test]
    public function achievements_should_be_linked_to_user_when_reporting_events(): void
    {

        $this->withExceptionHandling();

        $this->signIn();

        Storage::fake('latex');

        $this->seed('RolesAndPermissionsSeeder');

        $user = auth()->user();

        $events = \App\Event::factory()->count(5)->create(['creator_id' => $user->id, 'reported_at' => null, 'status' => 'APPROVED', 'start_date' => Carbon::now()]);

        $year = Carbon::now()->year;

        $this->assertCount(0, $user->achievements);

        $this->assertEquals(0, auth()->user()->getExperience()->points);

        foreach ($events as $event) {
            $this->reportEvent($event);
        }

        $this->assertEquals(10, $user->getExperience()->points);

        $this->assertCount(1, $user->fresh()->achievements);

        $this->assertEquals("Active Organiser {$year}", $user->fresh()->achievements[0]->name);

        $more_events = \App\Event::factory()->count(5)->create(['creator_id' => $user->id, 'reported_at' => null, 'status' => 'APPROVED', 'start_date' => Carbon::now(), 'end_date' => Carbon::now()]);

        foreach ($more_events as $event) {
            $this->reportEvent($event);
        }

        $this->assertEquals(20, $user->getExperience()->points);

        $this->assertCount(2, $user->fresh()->achievements);

        $this->assertEquals("Expert Organiser {$year}", $user->fresh()->achievements[1]->name);

    }

    public function reportEvent($event): void
    {
        $request = [
            'participants_count' => 10,
            'average_participant_age' => 20,
            'percentage_of_females' => 30,
            'codeweek_for_all_participation_code' => 'foobar',
            'name_for_certificate' => 'sdsqdsq',
        ];
        $this->post('/event/report/'.$event->fresh()->id, $request);
    }
}
