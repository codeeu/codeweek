<?php

namespace Tests\Unit\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\UserEmailUpdateService;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class UserEmailUpdateServiceTest extends TestCase
{
    use RefreshDatabase;

    private function makeCase(): SupportCase
    {
        return SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'codeweek-support — update account email',
            'raw_message' => 'test',
            'status' => 'investigating',
            'risk_level' => 'medium',
            'correlation_id' => 'cid',
        ]);
    }

    public function test_dry_run_plans_email_change_without_applying(): void
    {
        $user = User::factory()->create(['email' => 'old@example.com', 'email_display' => 'old@example.com']);

        $result = app(UserEmailUpdateService::class)->updateEmail(
            case: $this->makeCase(),
            fromEmail: 'old@example.com',
            toEmail: 'new@example.com',
            dryRun: true,
        );

        $this->assertTrue($result['ok']);
        $this->assertSame('new@example.com', $result['result']['after']['email']);
        $this->assertTrue($result['result']['would_update_email_display']);
        $this->assertSame('old@example.com', $user->fresh()->email);
    }

    public function test_apply_updates_email_with_email_approval(): void
    {
        config(['support_gmail.dry_run' => true]);
        $user = User::factory()->create(['email' => 'old@example.com', 'email_display' => 'old@example.com']);

        $result = app(UserEmailUpdateService::class)->updateEmail(
            case: $this->makeCase(),
            fromEmail: 'old@example.com',
            toEmail: 'new@example.com',
            dryRun: false,
            viaEmailApproval: true,
        );

        $this->assertTrue($result['ok']);
        $this->assertSame('new@example.com', $user->fresh()->email);
        $this->assertSame('new@example.com', $user->fresh()->email_display);
    }

    public function test_rejects_when_target_email_already_in_use(): void
    {
        User::factory()->create(['email' => 'old@example.com']);
        User::factory()->create(['email' => 'taken@example.com']);

        $result = app(UserEmailUpdateService::class)->updateEmail(
            case: $this->makeCase(),
            fromEmail: 'old@example.com',
            toEmail: 'taken@example.com',
            dryRun: true,
        );

        $this->assertFalse($result['ok']);
        $this->assertContains('to_email_already_in_use', $result['errors']);
    }
}
