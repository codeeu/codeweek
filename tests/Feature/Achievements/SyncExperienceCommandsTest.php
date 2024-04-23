<?php

namespace Tests\Feature\Achievements\Achievements;

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

        $user = factory(User::class)->create()->assignRole('leading teacher');

        create(\App\Event::class, [
            'creator_id' => $user->id,
            'created_at' => Carbon::now()->setYear(2021),
            'status' => 'APPROVED',
            'reported_at' => Carbon::now()->setYear(2021),
        ], 5);

        $this->assertCount(0, $user->fresh()->achievements);

        $this->artisan('badges:sync-users-achievements');

        $this->assertCount(1, $user->fresh()->achievements);

        $this->artisan('badges:sync-users-achievements');

        $this->assertCount(1, $user->fresh()->achievements);

    }
}
