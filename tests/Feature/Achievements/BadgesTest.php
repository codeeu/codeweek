<?php

namespace Tests\Feature\Achievements;

use PHPUnit\Framework\Attributes\Test;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BadgesTest extends TestCase
{
    use DatabaseMigrations;

    private $leading_teacher;

    private $leading_teacher_2;

    private $leading_teacher_admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');
        $this->leading_teacher = \App\User::factory()->create()->assignRole('leading teacher');
        $this->leading_teacher_2 = \App\User::factory()->create()->assignRole('leading teacher');
        $this->leading_teacher_admin = \App\User::factory()->create()->assignRole('leading teacher admin');
    }

    #[Test]
    public function only_leading_teachers_can_access_their_badges_page(): void
    {

        $this->signIn();
        $this->get(route('my-badges'))->assertStatus(403);

        $this->actingAs($this->leading_teacher);
        $this->get(route('my-badges'))->assertStatus(200);

    }

    #[Test]
    public function only_leading_teachers_admin_can_access_other_badges_pages(): void
    {

        $this->signIn();
        $this->get('/badges/user/1')->assertStatus(403);

        $this->actingAs($this->leading_teacher);

        $this->get('/badges/user/'.$this->leading_teacher->id)->assertStatus(200);

        $this->get('/badges/user/'.$this->leading_teacher_2->id)->assertStatus(403);

        $this->actingAs($this->leading_teacher_admin);

        //dd(auth()->user()->isLeadingTeacherAdmin());

        $this->get('/badges/user/'.$this->leading_teacher_2->id)->assertStatus(200);

    }

    #[Test]
    public function only_leading_teachers_can_see_my_badges_page(): void
    {

        $this->signIn();
        $this->get('/my/badges')->assertStatus(403)->assertDontSeeText('My Badges');

        $this->actingAs($this->leading_teacher);

        $this->get('/my/badges')->assertStatus(200)->assertSeeText('My Badges');

    }
}
