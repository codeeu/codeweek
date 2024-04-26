<?php

namespace Tests\Feature\Achievements\Achievements;

use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SyncExperienceCommandsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function leading_teacher_activity_achievement_command(): void
    {

        $this->seed('LeadingTeacherRoleSeeder');

        $user = \App\User::factory()->create()->assignRole('leading teacher');

        \App\Event::factory()->count(5)->create([
            'creator_id' => $user->id,
            'created_at' => Carbon::now()->setYear(2021),
            'status' => 'APPROVED',
            'reported_at' => Carbon::now()->setYear(2021),
        ]);

        $this->assertCount(0, $user->fresh()->achievements);

        $this->artisan('badges:sync-users-achievements');

        $this->assertCount(1, $user->fresh()->achievements);

        $this->artisan('badges:sync-users-achievements');

        $this->assertCount(1, $user->fresh()->achievements);

    }
}
