<?php

namespace Tests\Feature;

use App\Livewire\LeadingTeacherReportForm;
use App\LeadingTeacherAction;
use App\Mail\LeadingTeachingActionAdded;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class LeadingTeachersReportFormTest extends TestCase
{
    use DatabaseMigrations;

    private $leading_teacher;

    private $leading_teacher_admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');

        $this->leading_teacher = \App\User::factory()->create();
        $this->leading_teacher->assignRole('leading teacher');

        $this->leading_teacher_admin = \App\User::factory()->create();
        $this->leading_teacher_admin->assignRole('leading teacher admin');

    }

    #[Test]
    public function leading_teacher_action_should_be_created(): void
    {
        // Submit the form
        // Expect Action to be created in pending status
        $this->actingAs($this->leading_teacher);

        Livewire::test(LeadingTeacherReportForm::class)
            ->set('action_title', 'foo')
            ->set('action_type', 'bar')
            ->set('action_comment', 'doz')
            ->set('action_date', Carbon::now())
            ->call('submit')
            ->assertRedirect('/leading-teachers/dashboard');

        $this->assertTrue(LeadingTeacherAction::whereTitle('foo')->exists());

        //Email should have been fired
        Mail::assertQueued(LeadingTeachingActionAdded::class, function ($mail) {
            return $mail->hasTo($this->leading_teacher_admin->email);
        });

    }
}
