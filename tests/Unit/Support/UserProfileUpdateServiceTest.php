<?php

namespace Tests\Unit\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\UserProfileUpdateService;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProfileUpdateServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_update_dry_run_plans_change(): void
    {
        /** @var User $u */
        $u = User::factory()->create([
            'email' => 'profile@example.com',
            'firstname' => 'Bernard Hanna',
            'lastname' => 'Last Name',
        ]);

        $case = SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'test',
            'raw_message' => 'test',
            'status' => 'investigating',
            'risk_level' => 'low',
            'correlation_id' => 'cid',
        ]);

        $svc = app(UserProfileUpdateService::class);
        $payload = $svc->updateProfile($case, 'profile@example.com', 'Bernard', 'Hanna', true);

        $this->assertTrue($payload['ok']);
        $this->assertTrue($payload['result']['dry_run']);
        $this->assertSame('Bernard', $payload['result']['after']['firstname']);
        $this->assertSame('Hanna', $payload['result']['after']['lastname']);

        $u->refresh();
        $this->assertSame('Bernard Hanna', $u->firstname);
    }

    public function test_profile_update_resolves_duplicate_email_to_user_needing_change(): void
    {
        User::factory()->create([
            'email' => 'dup@example.com',
            'firstname' => 'Bernard',
            'lastname' => 'Hanna',
        ]);
        User::factory()->create([
            'email' => 'dup@example.com',
            'firstname' => 'Bernard Hanna',
            'lastname' => '',
        ]);

        $case = SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'test',
            'raw_message' => 'test',
            'status' => 'investigating',
            'risk_level' => 'low',
            'correlation_id' => 'cid',
        ]);

        $payload = app(UserProfileUpdateService::class)->updateProfile(
            $case,
            'dup@example.com',
            'Bernard',
            'Hanna',
            true,
        );

        $this->assertTrue($payload['ok']);
        $this->assertSame('Bernard Hanna', $payload['result']['before']['firstname']);
        $this->assertStringContainsString('resolved_duplicate_email_to_user_id:', (string) ($payload['warnings'][0] ?? ''));
    }

    public function test_profile_update_execute_changes_user(): void
    {
        config(['support_gmail.dry_run' => true]);

        /** @var User $u */
        $u = User::factory()->create([
            'email' => 'profile2@example.com',
            'firstname' => 'Wrong',
            'lastname' => 'Name',
        ]);

        $case = SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'test',
            'raw_message' => 'test',
            'status' => 'investigating',
            'risk_level' => 'low',
            'correlation_id' => 'cid',
        ]);

        $svc = app(UserProfileUpdateService::class);
        $payload = $svc->updateProfile($case, 'profile2@example.com', 'Bernard', 'Hanna', false, true);

        $this->assertTrue($payload['ok']);
        $u->refresh();
        $this->assertSame('Bernard', $u->firstname);
        $this->assertSame('Hanna', $u->lastname);
    }
}
