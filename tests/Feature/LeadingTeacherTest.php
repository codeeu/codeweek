<?php

namespace Tests\Feature;

use App\Http\Livewire\LeadingTeacherSignupForm;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class LeadingTeacherTest extends TestCase
{
    use DatabaseMigrations;

    private $leading_teacher;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');

        $this->leading_teacher = \App\Country::factory()->create(['iso' => 'FR']);
        $this->leading_teacher = \App\User::factory()->create()->assignRole('leading teacher');

    }

    #[Test]
    public function Leading_teacher_should_be_able_to_access_report_page(): void
    {

        $this->get(route('LT.report'))->assertStatus(403);

        $this->signIn($this->leading_teacher);
        $this->get(route('LT.report'))->assertStatus(200);

    }

    #[Test]
    public function should_become_leading_teacher_after_signup_(): void
    {

        $this->get(route('LT.signup'))->assertStatus(302);

        $user = \App\User::factory()->create();
        $this->signIn($user);

        $this->assertFalse($user->leadingTeacher);

        $city = create(\App\City::class, ['id' => 1004436363, 'city' => 'FooBarCity']);
        $level1 = create(\App\ResourceLevel::class, ['id' => 80, 'teach' => true]);
        $level2 = create(\App\ResourceLevel::class, ['id' => 85, 'teach' => true]);
        $subject1 = \App\ResourceSubject::factory()->create(['id' => 511]);
        $subject2 = \App\ResourceSubject::factory()->create(['id' => 512]);
        $subject3 = \App\ResourceSubject::factory()->create(['id' => 400]);
        $expertise1 = create(\App\LeadingTeacherExpertise::class, ['id' => 101]);
        $expertise2 = create(\App\LeadingTeacherExpertise::class, ['id' => 102]);

        Livewire::test(LeadingTeacherSignupForm::class)
            ->set('first_name', 'Foo')
            ->set('last_name', 'Bar')
            ->set('selectedCountry', 'Mars')
            ->set('twitter', null)
            ->set('tag', 'my-tag-001')
            ->set('selectedLevels', [$level1->id, $level2->id])
            ->set('selectedSubjects', [$subject1->id, $subject2->id, $subject3->id])
            ->set('selectedExpertises', [$expertise1->id, $expertise2->id])
            ->set('selectedCity', 1004436363)
            ->set('isLeadingTeacher', true)
            ->set('privacy', true)
            ->call('submit');

        $this->assertEquals([101, 102], $user->expertises()->pluck('id')->toArray());
        $this->assertEquals([80, 85], $user->levels()->pluck('id')->toArray());
        $this->assertEquals([511, 512, 400], $user->subjects()->pluck('id')->toArray());
        $this->assertEquals('Foo Bar', $user->fullName);
        $this->assertEquals('my-tag-001', $user->tag);
        $this->assertEquals('FooBarCity', $user->city->name);

        $this->assertTrue($user->leadingTeacher);

    }
}
