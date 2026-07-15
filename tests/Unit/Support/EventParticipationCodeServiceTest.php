<?php

namespace Tests\Unit\Support;

use App\Event;
use App\Services\Support\EventParticipationCodeService;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class EventParticipationCodeServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_dry_run_lists_only_scoped_events(): void
    {
        $user = User::factory()->create();

        Event::factory()->create([
            'creator_id' => $user->id,
            'codeweek_for_all_participation_code' => 'cw25-E6CDg',
            'created_at' => '2026-06-10 10:00:00',
        ]);

        Event::factory()->create([
            'creator_id' => $user->id,
            'codeweek_for_all_participation_code' => 'cw25-E6CDg',
            'created_at' => '2026-05-10 10:00:00',
        ]);

        $result = app(EventParticipationCodeService::class)->update(
            'cw25-E6CDg',
            'cw26-wNc6o',
            2026,
            6,
            dryRun: true,
        );

        $this->assertTrue($result['ok']);
        $this->assertSame(1, $result['result']['matched_count']);
        $this->assertSame('cw26-wNc6o', $result['result']['would_update_to']);
    }

    public function test_update_changes_only_scoped_events(): void
    {
        $user = User::factory()->create();

        $june = Event::factory()->create([
            'creator_id' => $user->id,
            'codeweek_for_all_participation_code' => 'cw25-E6CDg',
            'created_at' => '2026-06-10 10:00:00',
        ]);

        $may = Event::factory()->create([
            'creator_id' => $user->id,
            'codeweek_for_all_participation_code' => 'cw25-E6CDg',
            'created_at' => '2026-05-10 10:00:00',
        ]);

        $result = app(EventParticipationCodeService::class)->update(
            'cw25-E6CDg',
            'cw26-wNc6o',
            2026,
            6,
            dryRun: false,
        );

        $this->assertTrue($result['ok']);
        $this->assertSame(1, $result['result']['updated_count']);
        $this->assertSame('cw26-wNc6o', $june->fresh()->codeweek_for_all_participation_code);
        $this->assertSame('cw25-E6CDg', $may->fresh()->codeweek_for_all_participation_code);
    }
}
