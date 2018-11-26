<?php

namespace Tests\Feature;

use App\School;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MapTest extends TestCase
{

    use DatabaseMigrations;

    private $ambassador_be;
    private $ambassador_fr;
    private $admin_be;
    private $belgium;
    private $france;




    /** @test */
    public function get_list_of_approved_upcoming_events()
    {

        $this->withExceptionHandling();

        create('App\Event', ['start_date' => Carbon::now(),'end_date' => Carbon::now()->addDay(), 'status' => 'APPROVED','country_iso' => 'BE'], 7);
        create('App\Event', ['start_date' => Carbon::now(), 'end_date' => Carbon::now()->addDay(), 'status' => 'PENDING','country_iso' => 'BE'], 6);
        create('App\Event', ['start_date' => Carbon::now()->subyear(), 'status' => 'APPROVED'], 3);


        $results = $this->json('GET', '/api/event/list');



        $this->assertCount(7, $results->json()['BE']);

    }
   /** @test */
    public function get_list_of_approved_events_for_another_year()
    {


        $this->withExceptionHandling();

        create('App\Event', ['start_date' => Carbon::now(), 'status' => 'APPROVED','country_iso' => 'BE'], 7);
        create('App\Event', ['start_date' => Carbon::now(), 'status' => 'PENDING','country_iso' => 'BE'], 6);
        create('App\Event', ['start_date' => Carbon::now()->subyear(),'end_date' => Carbon::now()->subyear(), 'status' => 'APPROVED','country_iso' => 'BE'], 3);


        $results = $this->json('GET', '/api/event/list?year=2017');


        $this->assertCount(3, $results->json()['BE']);

    }

    /** @test */
    public function structure_event()
    {

        create('App\Event', ['start_date' => Carbon::now(), 'status' => 'APPROVED','country_iso' => 'BE'], 7);
        create('App\Event', ['start_date' => Carbon::now(), 'status' => 'PENDING','country_iso' => 'BE'], 6);
        create('App\Event', ['start_date' => Carbon::now()->subyear(), 'status' => 'APPROVED','country_iso' => 'BE'], 3);


        $result = $this->getJson('/api/event/list');

        $item = $result->json()['BE'][0];

        $this->assertArrayHasKey('id',$item);
        $this->assertArrayHasKey('geoposition',$item);



    }

    /** @test */
    public function get_event_detail()
    {

        $this->withExceptionHandling();

        $event = create('App\Event', ['start_date' => Carbon::now(), 'status' => 'APPROVED','title'=>'foobar']);



        $response = $this->getJson('/api/event/detail?id=' . $event->id)->json();



        $this->assertEquals($response['data']['title'], $event->title);


    }


}


