<?php

namespace Tests\Unit\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\UserRoleRemoveService;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

final class UserRoleRemoveServiceTest extends TestCase
{
    use RefreshDatabase;

    private function makeCase(): SupportCase
    {
        return SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'codeweek-support — remove ambassador role',
            'raw_message' => 'test',
            'status' => 'investigating',
            'risk_level' => 'low',
            'correlation_id' => 'cid',
        ]);
    }

    public function test_dry_run_plans_role_removals_without_applying(): void
    {
        Role::create(['name' => 'ambassador', 'guard_name' => 'web']);
        $user = User::factory()->create(['email' => 'amb@example.com']);
        $user->assignRole('ambassador');

        $result = app(UserRoleRemoveService::class)->removeRole(
            case: $this->makeCase(),
            roleName: 'ambassadors',
            emails: ['amb@example.com', 'missing@example.com'],
            dryRun: true,
        );

        $this->assertTrue($result['ok']);
        $this->assertSame('ambassador', $result['result']['role']);
        $this->assertSame(1, $result['result']['summary']['would_remove']);
        $this->assertSame(1, $result['result']['summary']['user_not_found']);
        $this->assertTrue($user->fresh()->hasRole('ambassador'));
    }

    public function test_apply_removes_role_from_existing_users(): void
    {
        config(['support_gmail.dry_run' => true]);
        Role::create(['name' => 'ambassador', 'guard_name' => 'web']);
        $a = User::factory()->create(['email' => 'a@example.com']);
        $b = User::factory()->create(['email' => 'b@example.com']);
        $a->assignRole('ambassador');

        $result = app(UserRoleRemoveService::class)->removeRole(
            case: $this->makeCase(),
            roleName: 'ambassador',
            emails: ['a@example.com', 'b@example.com'],
            dryRun: false,
            viaEmailApproval: true,
        );

        $this->assertTrue($result['ok']);
        $this->assertSame(1, $result['result']['summary']['removed']);
        $this->assertSame(1, $result['result']['summary']['does_not_have_role']);
        $this->assertFalse($a->fresh()->hasRole('ambassador'));
    }
}
