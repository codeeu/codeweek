<?php

namespace Tests\Unit\BulkUserChanges;

use App\Services\BulkUserChanges\BulkUserChangesPlanner;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

final class BulkUserChangesPlannerTest extends TestCase
{
    use RefreshDatabase;

    public function test_dry_run_plans_role_add_and_country_update_without_creating_user(): void
    {
        \App\Country::factory()->create(['iso' => 'BE', 'name' => 'Belgium']);
        \App\Country::factory()->create(['iso' => 'PL', 'name' => 'Poland']);

        Role::create(['name' => 'leading teacher', 'guard_name' => 'web']);
        User::factory()->create(['email' => 'teacher@example.com', 'country_iso' => 'BE']);

        $plan = app(BulkUserChangesPlanner::class)->plan([
            [
                'row_number' => 10,
                'country' => 'Poland',
                'full_name' => 'Test Teacher',
                'email' => 'teacher@example.com',
                'action' => 'add',
                'role' => 'leading teachers',
                'operation' => 'role_add',
                'role_name' => 'leading teacher',
                'new_email' => null,
            ],
            [
                'row_number' => 11,
                'country' => 'Poland',
                'full_name' => 'Missing Person',
                'email' => 'missing@example.com',
                'action' => 'add',
                'role' => 'leading teachers',
                'operation' => 'role_add',
                'role_name' => 'leading teacher',
                'new_email' => null,
            ],
        ]);

        $this->assertSame(1, $plan->summary['would_apply'] ?? 0);
        $this->assertSame(1, $plan->summary['skipped_user_not_found'] ?? 0);
        $this->assertFalse(User::query()->where('email', 'missing@example.com')->exists());
    }
}
