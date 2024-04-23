<?php

namespace Tests\Feature;

use App\Http\Livewire\LeadingTeacherReportForm;
use App\LeadingTeacherAction;
use App\Mail\LeadingTeachingActionAdded;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire;
use Tests\TestCase;

class LeadingTeachersReportFormTest extends TestCase
{
    use RefreshDatabase;

    private $leading_teacher;

    private $leading_teacher_admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');

        $this->leading_teacher = create(\App\User::class);
        $this->leading_teacher->assignRole('leading teacher');

        $this->leading_teacher_admin = create(\App\User::class);
        $this->leading_teacher_admin->assignRole('leading teacher admin');

    }

    /** @test */
    public function leading_teacher_action_should_be_created()
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
