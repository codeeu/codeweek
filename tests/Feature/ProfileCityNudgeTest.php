<?php

namespace Tests\Feature;

use App\City;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class ProfileCityNudgeTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');
    }

    #[Test]
    public function leading_teacher_without_a_city_is_warned_they_are_missing_from_the_map(): void
    {
        $teacher = User::factory()->create([
            'city_id' => null,
            'email_verified_at' => now(),
        ]);
        $teacher->assignRole('leading teacher');

        $this->signIn($teacher);

        $this->get('/profile')
            ->assertOk()
            ->assertSee(__('base.city_required_for_community_map'), false);
    }

    #[Test]
    public function leading_teacher_with_a_city_is_not_warned(): void
    {
        $city = City::factory()->create();

        $teacher = User::factory()->create([
            'city_id' => $city->id,
            'email_verified_at' => now(),
        ]);
        $teacher->assignRole('leading teacher');

        $this->signIn($teacher);

        $this->get('/profile')
            ->assertOk()
            ->assertDontSee(__('base.city_required_for_community_map'), false);
    }

    #[Test]
    public function a_plain_member_without_a_city_is_not_warned(): void
    {
        $member = User::factory()->create([
            'city_id' => null,
            'email_verified_at' => now(),
        ]);

        $this->signIn($member);

        $this->get('/profile')
            ->assertOk()
            ->assertDontSee(__('base.city_required_for_community_map'), false);
    }
}
