<?php

namespace Tests\Feature;

use App\Certificate;
use App\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class ReportEventTest extends TestCase
{
    use DatabaseMigrations;

    protected $event;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed('RolesAndPermissionsSeeder');
        $this->event = \App\Event::factory()->create(['status' => 'APPROVED', 'start_date' => Carbon::now()->subMonth(1)]);

    }

    #[Test]
    public function event_owner_should_see_the_report_banner(): void
    {

        $this->withExceptionHandling();

        $this->signIn($this->event->owner);

        $this->get('/view/'.$this->event->id.'/random')
            ->assertSee('report-event');

    }

    #[Test]
    public function visitors_should_not_see_the_report_banner(): void
    {

        $this->withExceptionHandling();

        $this->get('/view/'.$this->event->id.'/random')
            ->assertDontSee('report-event');

    }

    #[Test]
    public function owners_should_not_see_the_report_banner_if_event_is_not_over_yet(): void
    {

        $this->withExceptionHandling();

        $future_event = \App\Event::factory()->create(['start_date' => Carbon::now()->addMonth(1)]);
        $this->signIn($future_event->owner);

        $this->get('/view/'.$future_event->id.'/random')
            ->assertDontSee('report-event');

    }

    #[Test]
    public function reporting_only_when_logged_in(): void
    {

        $this->withExceptionHandling();

        $this->post('/api/event/report/'.$this->event->id)
            ->assertRedirect();

    }

    #[Test]
    public function report_event_status_update(): void
    {

        $this->withExceptionHandling();

        Storage::fake('latex');

        $this->signIn($this->event->owner);

        $this->assertEquals($this->event->reported_at, null);

        $request = [
            'participants_count' => 10,
            'average_participant_age' => 20,
            'percentage_of_females' => 30,
            'codeweek_for_all_participation_code' => 'foobar',
            'name_for_certificate' => 'sdsqdsq',
        ];
        $this->post('/event/report/'.$this->event->id, $request);

        $event = Event::where('id', $this->event->id)->first();

        $this->assertNotEquals($event->reported_at, null);
        $this->assertEquals($event->participants_count, 10);
        $this->assertEquals($event->average_participant_age, 20);
        $this->assertEquals($event->percentage_of_females, 30);
        $this->assertEquals($event->codeweek_for_all_participation_code, 'foobar');
        $this->assertEquals($event->name_for_certificate, 'sdsqdsq');

    }

    #[Test]
    public function exception_should_be_thrown_while_trying_to_report(): void
    {

        //$this->withExceptionHandling();

        $request = [
            'participants_count' => 10,
            'average_participant_age' => 20,
            'percentage_of_females' => 30,
            'codeweek_for_all_participation_code' => 'foobar',
            'name_for_certificate' => 'sdsqdsq',
        ];
        $this->post('/event/report/'.$this->event->id, $request)
            ->assertStatus(Response::HTTP_FORBIDDEN);

    }

    #[Test]
    public function user_should_see_list_of_his_reportable_events(): void
    {
        $this->signIn(\App\User::factory()->create());

        $myReportableEvent = \App\Event::factory()->create(['creator_id' => auth()->id(), 'status' => 'APPROVED', 'start_date' => Carbon::now()->subDay()]);
        $futureEvent = \App\Event::factory()->create(['creator_id' => auth()->id(), 'status' => 'APPROVED', 'start_date' => Carbon::now()->addDay(1)]);
        $alreadyReportedEvent = \App\Event::factory()->create(['creator_id' => auth()->id(), 'status' => 'APPROVED', 'reported_at' => Carbon::now(), 'certificate_url' => 'foobar.xyz']);
        $faultyReportedEvent = \App\Event::factory()->create(['creator_id' => auth()->id(), 'status' => 'APPROVED', 'reported_at' => Carbon::now(), 'certificate_url' => null]);
        $myNonReportableEvent = \App\Event::factory()->create(['creator_id' => auth()->id(), 'status' => 'PENDING']);
        $notMyEvent = \App\Event::factory()->create(['status' => 'APPROVED']);

        $this->get('/events_to_report')
            ->assertSee($myReportableEvent->title)
            ->assertSee($faultyReportedEvent->title)
            ->assertDontSee($myNonReportableEvent->title)
            ->assertDontSee($notMyEvent->title)
            ->assertDontSee($alreadyReportedEvent->title)
            ->assertDontSee($futureEvent->title);
    }

    #[Test]
    public function text_should_not_be_detected_as_greek(): void
    {

        $certificate = new Certificate($this->event);
        $this->assertFalse($certificate->is_greek());

    }

    #[Test]
    public function text_should_be_detected_as_greek(): void
    {

        $this->event->name_for_certificate = 'Λιανού Κυριακή - Lianou Kiriaki 10ο Δημοτικό Σχολείο Αιγάλεω';
        $certificate = new Certificate($this->event);
        $this->asserttrue($certificate->is_greek());

    }

    #[Test]
    public function text_should_be_detected_as_greek_with_all_uppercase(): void
    {

        $this->event->name_for_certificate = 'ΖΑΧΑΡΩΦ ΣΟΝΙΑ';
        $certificate = new Certificate($this->event);
        $this->asserttrue($certificate->is_greek());

    }

    #[Test]
    public function text_should_be_detected_as_greek_with_one_greek_char(): void
    {

        $this->event->name_for_certificate = 'This is a Σ';
        $certificate = new Certificate($this->event);
        $this->asserttrue($certificate->is_greek());

    }

    #[Test]
    public function text_should_not_be_detected_as_greek_with_one_special_char(): void
    {

        $this->event->name_for_certificate = 'Teacher Di Lella Lucia and the 1D con l’evento  “Di Pixel in Pixel.. cosa apparirà?:stuck_out_tongue_winking_eye:';
        $certificate = new Certificate($this->event);
        $this->assertfalse($certificate->is_greek());

    }

    #[Test]
    public function text_should_not_be_detected_as_greek_with_several_special_chars(): void
    {

        $this->event->name_for_certificate = 'Nemyriv Educational Establishment "Comprehensive Shool of I-III grades №2-lyceum" - of Nemyriv town Concil Vinnytsia Region';
        $certificate = new Certificate($this->event);
        $this->assertfalse($certificate->is_greek());

    }
}
