<?php

namespace Tests\Unit\Support;

use App\Services\Support\UserAuditService;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAuditServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_audit_finds_soft_deleted_user_by_email_display(): void
    {
        /** @var User $u */
        $u = User::factory()->create([
            'email' => 'primary@example.com',
            'email_display' => 'alias@example.com',
        ]);
        $u->delete();

        $svc = app(UserAuditService::class);
        $result = $svc->audit('alias@example.com');

        $this->assertSame('alias@example.com', $result['normalized_email']);
        $this->assertCount(1, $result['matched_users']);
        $this->assertTrue($result['matched_users'][0]['is_deleted']);
    }
}

