<?php

namespace Tests\Unit\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\UserRoleAddService;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

final class UserRoleAddServiceTest extends TestCase
{
    use RefreshDatabase;

    private function makeCase(): SupportCase
    {
        return SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'codeweek-support — add leading teachers',
            'raw_message' => 'test',
            'status' => 'investigating',
            'risk_level' => 'low',
            'correlation_id' => 'cid',
        ]);
    }

    public function test_dry_run_plans_role_additions_without_applying(): void
    {
        Role::create(['name' => 'leading teacher', 'guard_name' => 'web']);
        $user = User::factory()->create(['email' => 'lt@example.com']);

        $result = app(UserRoleAddService::class)->addRole(
            case: $this->makeCase(),
            roleName: 'leading teachers',
            emails: ['lt@example.com', 'missing@example.com'],
            dryRun: true,
        );

        $this->assertTrue($result['ok']);
        $this->assertSame('leading teacher', $result['result']['role']);
        $this->assertSame(1, $result['result']['summary']['would_add']);
        $this->assertSame(1, $result['result']['summary']['user_not_found']);
        $this->assertFalse($user->fresh()->hasRole('leading teacher'));
    }

    public function test_apply_adds_role_to_existing_users(): void
    {
        config(['support_gmail.dry_run' => true]);
        Role::create(['name' => 'leading teacher', 'guard_name' => 'web']);
        $a = User::factory()->create(['email' => 'a@example.com']);
        $b = User::factory()->create(['email' => 'b@example.com']);
        $b->assignRole('leading teacher');

        $result = app(UserRoleAddService::class)->addRole(
            case: $this->makeCase(),
            roleName: 'leading teacher',
            emails: ['a@example.com', 'b@example.com'],
            dryRun: false,
            viaEmailApproval: true,
        );

        $this->assertTrue($result['ok']);
        $this->assertSame(1, $result['result']['summary']['added']);
        $this->assertSame(1, $result['result']['summary']['already_has_role']);
        $this->assertTrue($a->fresh()->hasRole('leading teacher'));
    }

    public function test_apply_blocked_without_email_approval_in_dry_run_mode(): void
    {
        config(['support_gmail.dry_run' => true]);
        Role::create(['name' => 'leading teacher', 'guard_name' => 'web']);
        User::factory()->create(['email' => 'a@example.com']);

        $result = app(UserRoleAddService::class)->addRole(
            case: $this->makeCase(),
            roleName: 'leading teacher',
            emails: ['a@example.com'],
            dryRun: false,
            viaEmailApproval: false,
        );

        $this->assertFalse($result['ok']);
        $this->assertContains('dry_run_mode_requires_email_approval', $result['errors']);
    }

    public function test_unknown_role_fails(): void
    {
        $result = app(UserRoleAddService::class)->addRole(
            case: $this->makeCase(),
            roleName: 'wizard',
            emails: ['a@example.com'],
            dryRun: true,
        );

        $this->assertFalse($result['ok']);
        $this->assertStringContainsString('role_not_found', $result['errors'][0]);
    }

    public function test_duplicate_email_marked_ambiguous(): void
    {
        Role::create(['name' => 'leading teacher', 'guard_name' => 'web']);
        User::factory()->create(['email' => 'dup@example.com']);
        User::factory()->create(['email' => 'dup@example.com']);

        $result = app(UserRoleAddService::class)->addRole(
            case: $this->makeCase(),
            roleName: 'leading teacher',
            emails: ['dup@example.com'],
            dryRun: true,
        );

        $this->assertTrue($result['ok']);
        $this->assertSame(1, $result['result']['summary']['ambiguous']);
    }

    public function test_role_allowlist_restricts_when_configured(): void
    {
        config(['support_gmail.role_add_allowed_roles' => ['leading teacher']]);
        Role::create(['name' => 'leading teacher', 'guard_name' => 'web']);
        Role::create(['name' => 'super admin', 'guard_name' => 'web']);
        User::factory()->create(['email' => 'a@example.com']);

        $result = app(UserRoleAddService::class)->addRole(
            case: $this->makeCase(),
            roleName: 'super admin',
            emails: ['a@example.com'],
            dryRun: true,
        );

        $this->assertFalse($result['ok']);
        $this->assertStringContainsString('role_not_allowed', $result['errors'][0]);
    }
}
