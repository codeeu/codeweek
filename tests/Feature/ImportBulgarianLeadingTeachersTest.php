<?php

namespace Tests\Feature;

use App\Country;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class ImportBulgarianLeadingTeachersTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');
        Country::factory()->create(['iso' => 'BG', 'name' => 'Bulgaria']);
    }

    #[Test]
    public function dry_run_does_not_write_users(): void
    {
        $this->artisan('leading-teachers:import-bulgaria', ['--dry-run' => true])
            ->assertSuccessful();

        $this->assertSame(0, User::where('tag', 'like', 'BG-%')->count());
    }

    #[Test]
    public function import_creates_users_with_tags_and_role(): void
    {
        $this->artisan('leading-teachers:import-bulgaria')
            ->assertSuccessful();

        $this->assertSame(26, User::role('leading teacher')->where('country_iso', 'BG')->whereNotNull('tag')->count());

        $user = User::where('email', 'd_dimitrova@sukim.eu')->first();
        $this->assertNotNull($user);
        $this->assertSame('BG-Ddimitrova-001', $user->tag);
        $this->assertTrue($user->hasRole('leading teacher'));
        $this->assertSame('BG', $user->country_iso);
    }

    #[Test]
    public function import_updates_existing_user_tag_and_is_idempotent(): void
    {
        $existing = User::factory()->create([
            'email' => 'd_dimitrova@sukim.eu',
            'firstname' => 'Old',
            'lastname' => 'Name',
            'country_iso' => 'BG',
            'tag' => null,
        ]);

        $this->artisan('leading-teachers:import-bulgaria')->assertSuccessful();
        $this->artisan('leading-teachers:import-bulgaria')->assertSuccessful();

        $existing->refresh();
        $this->assertSame('Desislava', $existing->firstname);
        $this->assertSame('Dimitrova', $existing->lastname);
        $this->assertSame('BG-Ddimitrova-001', $existing->tag);
        $this->assertTrue($existing->hasRole('leading teacher'));
        $this->assertSame(1, User::where('email', 'd_dimitrova@sukim.eu')->count());
    }
}
