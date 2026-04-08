<?php

namespace Tests\Unit\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\UserRestoreService;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRestoreServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_restore_dry_run_plans_change(): void
    {
        /** @var User $u */
        $u = User::factory()->create(['email' => 'user@example.com']);
        $u->delete();

        $case = SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'test',
            'raw_message' => 'test',
            'status' => 'investigating',
            'risk_level' => 'medium',
            'correlation_id' => 'cid',
        ]);

        $svc = app(UserRestoreService::class);
        $payload = $svc->restore($case, 'user@example.com', true, 0.99);

        $this->assertTrue($payload['ok']);
        $this->assertTrue($payload['result']['dry_run']);
        $this->assertCount(1, $payload['result']['changes_planned']);
        $this->assertCount(0, $payload['result']['changes_applied']);
    }

    public function test_user_restore_execute_restores_user(): void
    {
        /** @var User $u */
        $u = User::factory()->create(['email' => 'user2@example.com']);
        $u->delete();

        $case = SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'test',
            'raw_message' => 'test',
            'status' => 'investigating',
            'risk_level' => 'medium',
            'correlation_id' => 'cid',
        ]);

        $svc = app(UserRestoreService::class);
        $payload = $svc->restore($case, 'user2@example.com', false, 0.99);

        $this->assertTrue($payload['ok']);
        $this->assertFalse($payload['result']['dry_run']);
        $this->assertTrue($payload['result']['verification']['is_restored']);
    }
}

