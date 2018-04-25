<?php

namespace Tests\Feature;

use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AmbassadorTest extends TestCase
{

    use DatabaseMigrations;

    private $ambassador_be;
    private $ambassador_fr;
    private $admin_be;
    private $belgium;
    private $france;


    public function setup()
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->france = create('App\Country',['iso'=>'FR']);
        $this->belgium = create('App\Country',['iso'=>'BE']);

        $this->admin_be = create('App\User', ['country_iso' => $this->belgium->iso])->assignRole('super admin');
        $this->ambassador_be = create('App\User', ['country_iso' => $this->belgium->iso])->assignRole('ambassador');
        $this->ambassador_fr = create('App\User', ['country_iso' => $this->france->iso])->assignRole('ambassador');


    }

    /** @test */
    public function get_ambassadors_for_a_country()
    {

        $this->withExceptionHandling();

        //$this->get('/ambassadors')->assertSee($this->ambassador_be->name);
        $this->get('/ambassadors?country_iso=BE')->assertSee($this->ambassador_be->lastname);
        $this->get('/ambassadors?country_iso=BE')->assertDontSee($this->ambassador_fr->lastname);
        $this->get('/ambassadors?country_iso=BE')->assertDontSee($this->admin_be->lastname);


    }

    /** @test */
    public function ambassador_page_for_a_country_should_display_the_facebook_link()
    {

        create('App\Event', ['country_iso'=>'BE']);


        $this->get('/ambassadors?country_iso=BE')->assertSee($this->belgium->facebook);


    }

    /** @test */
    public function ambassador_page_for_a_country_should_display_the_website_link()
    {

        create('App\Event', ['country_iso'=>'BE']);


        $this->get('/ambassadors?country_iso=BE')->assertSee($this->belgium->website);


    }


}


