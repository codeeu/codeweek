<?php

namespace Tests\Feature;

use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Torann\GeoIP\Facades\GeoIP;

class FooterTest extends TestCase
{
    use DatabaseMigrations;
    private $france;
    private $ambassador_fr;

    public function setup() :void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->france = create('App\Country',['iso'=>'FR']);
        $this->ambassador_fr = create('App\User', ['country_iso' => $this->france->iso])->assignRole('ambassador');

    }

    /** @test */
    public function info_email_should_be_displayed_in_footer_only_on_ambassadors_page()
    {

        $this->get('/ambassadors?country_iso=FR')->assertSee('mailto:info@codeweek.eu');


    }

    /** @test */
    public function info_email_should_not_be_displayed_in_footer_on_other_pages()
    {

        $this->get('/')->assertDontSee('mailto:info@codeweek.eu');


    }






}


