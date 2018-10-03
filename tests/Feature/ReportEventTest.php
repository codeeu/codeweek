<?php

namespace Tests\Feature;

use App\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Tests\TestCase;

class ReportEventTest extends TestCase
{

    use DatabaseMigrations;

    protected $event;

    public function setup()
    {
        parent::setUp();

        $this->seed('RolesAndPermissionsSeeder');
        $this->event = create('App\Event', ["status"=>"APPROVED","start_date"=>Carbon::now()->subMonth(1)]);


    }

    /** @test */
    public function event_owner_should_see_the_report_banner()
    {

        $this->withExceptionHandling();


        $this->signIn($this->event->owner);

        $this->get('/view/' . $this->event->id . '/random')
            ->assertSee("report-event");


    }

    /** @test */
    public function visitors_should_not_see_the_report_banner()
    {

        $this->withExceptionHandling();


        $this->get('/view/' . $this->event->id . '/random')
            ->assertDontSee("report-event");


    }

    /** @test */
    public function owners_should_not_see_the_report_banner_if_event_is_not_over_yet()
    {

        $this->withExceptionHandling();


        $future_event = create('App\Event', ["start_date"=>Carbon::now()->addMonth(1)]);
        $this->signIn($future_event->owner);

        $this->get('/view/' . $future_event->id . '/random')
            ->assertDontSee("report-event");


    }

    /** @test */
    public function reporting_only_when_logged_in()
    {

        $this->withExceptionHandling();

        $this->post('/api/event/report/' . $this->event->id)
            ->assertRedirect();


    }

    /** @test */
    public function report_event_status_update()
    {

        $this->withExceptionHandling();


        $this->signIn($this->event->owner);

        $this->assertEquals($this->event->reported_at, null);

        $request = [
            "participants_count" => 10,
            "average_participant_age" => 20,
            "percentage_of_females" => 30,
            "codeweek_for_all_participation_code" => "foobar",
            "name_for_certificate" => "sdsqdsq"
        ];
        $this->post('/event/report/' . $this->event->id, $request);


        $event = Event::where('id', $this->event->id)->first();

        $this->assertNotEquals($event->reported_at, null);
        $this->assertEquals($event->participants_count, 10);
        $this->assertEquals($event->average_participant_age, 20);
        $this->assertEquals($event->percentage_of_females, 30);
        $this->assertEquals($event->codeweek_for_all_participation_code, "foobar");
        $this->assertEquals($event->name_for_certificate, "sdsqdsq");

    }

    /** @test */
    public function exception_should_be_thrown_while_trying_to_report()
    {

        //$this->withExceptionHandling();



        $request = [
            "participants_count" => 10,
            "average_participant_age" => 20,
            "percentage_of_females" => 30,
            "codeweek_for_all_participation_code" => "foobar",
            "name_for_certificate" => "sdsqdsq"
        ];
        $this->post('/event/report/' . $this->event->id, $request)
            ->assertStatus(Response::HTTP_FORBIDDEN);






    }

    /** @test */
    public function user_should_see_list_of_his_reportable_events(){
        $this->signIn(create('App\User'));

        $myReportableEvent = create('App\Event', ['creator_id' => auth()->id(),'status'=>'APPROVED', 'start_date' => Carbon::now()->subDay()]);
        $futureEvent = create('App\Event', ['creator_id' => auth()->id(),'status'=>'APPROVED', 'start_date' => Carbon::now()->addDay(1)]);
        $alreadyReportedEvent = create('App\Event', ['creator_id' => auth()->id(),'status'=>'APPROVED', 'reported_at'=>Carbon::now()]);
        $myNonReportableEvent = create('App\Event', ['creator_id' => auth()->id(), 'status'=>'PENDING']);
        $notMyEvent = create('App\Event', ['status'=>'APPROVED']);


        $this->get('/events_to_report')
            ->assertSee($myReportableEvent->title)
            ->assertDontSee($myNonReportableEvent->title)
            ->assertDontSee($notMyEvent->title)
            ->assertDontSee($alreadyReportedEvent->title)
            ->assertDontSee($futureEvent->title)
        ;
    }


}


