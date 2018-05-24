<?php

namespace Tests\Feature;

use App\Event;
use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Torann\GeoIP\Facades\GeoIP;

class ReportEventTest extends TestCase
{

    use DatabaseMigrations;

    protected $event;

    public function setup()
    {
        parent::setUp();

        $this->seed('RolesAndPermissionsSeeder');
        $this->event = create('App\Event', []);


/*        $this->france = create('App\Country', ['iso' => 'FR']);
        $this->belgium = create('App\Country', ['iso' => 'BE']);

        $this->admin_be = create('App\User', ['country_iso' => $this->belgium->iso])->assignRole('super admin');
        $this->ambassador_be = create('App\User', ['country_iso' => $this->belgium->iso])->assignRole('ambassador');
        $this->ambassador_fr = create('App\User', ['country_iso' => $this->france->iso])->assignRole('ambassador');
*/
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


        $this->post('/api/event/report/' . $this->event->id)
            ->assertSuccessful();

        $event = Event::where('id',$this->event->id)->first();

        $this->assertNotEquals($event->reported_at, null);

    }




}


