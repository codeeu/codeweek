<?php

namespace Tests\Feature;

use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Torann\GeoIP\Facades\GeoIP;

class AmbassadorTest extends TestCase
{

    use DatabaseMigrations;

    private $ambassador_be;
    private $ambassador_fr;
    private $admin_be;
    private $belgium;
    private $france;
    private $italy;


    public function setup() :void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->france = create('App\Country',['iso'=>'FR']);
        $this->belgium = create('App\Country',['iso'=>'BE','facebook'=>'facebook_url']);


        $this->admin_be = create('App\User', ['country_iso' => $this->belgium->iso])->assignRole('super admin');
        $this->ambassador_be = create('App\User', ['country_iso' => $this->belgium->iso])->assignRole('ambassador');
        $this->ambassador_fr = create('App\User', ['country_iso' => $this->france->iso])->assignRole('ambassador');


    }

//   Does not feel right not to have all countries
//    /** @test */
//    public function ambassadors_page_should_only_display_countries_with_ambassadors(){
//
//        $italy = create('App\Country',['iso'=>'foobar']);
//        create('App\Event',['country_iso' => $italy->iso]);
//        $this->get('/ambassadors?country_iso=BE')->assertDontSee($italy->iso);
//
//    }

    /** @test */
    public function ambassadors_without_bio_and_avatars_should_not_be_displayed()
    {

        $ambassador_without_bio = create('App\User', ['bio' => NULL, 'avatar_path' => NULL, 'country_iso' => $this->france->iso])->assignRole('ambassador');

        create('App\Event', ['country_iso' => $this->france->iso]);
        $this->get('/ambassadors?country_iso=FR')->assertDontSee($ambassador_without_bio->lastname);

        $ambassador_without_bio->bio = "updated bio";
        $ambassador_without_bio->save();
        $this->get('/ambassadors?country_iso=FR')->assertDontSee($ambassador_without_bio->lastname);

        $ambassador_without_bio->avatar_path="avatar.jpg";
        $ambassador_without_bio->save();
        $this->get('/ambassadors?country_iso=FR')->assertSee($ambassador_without_bio->lastname);

    }

    /** @test */
    public function ambassadors_without_picture_should_not_be_displayed()
    {

        $ambassador_without_bio = create('App\User', ['avatar_path' => NULL, 'country_iso' => $this->france->iso])->assignRole('ambassador');
//dd($ambassador_without_bio);
        $italy = create('App\Country', ['iso' => 'foobar']);
        create('App\Event', ['country_iso' => $italy->iso]);
        $this->get('/ambassadors?country_iso=' . $this->france->iso)->assertDontSee($ambassador_without_bio->lastname);

    }

    /** @test */
    public function ambassadors_with_picture_should_be_displayed()
    {

        $ambassador_without_bio = create('App\User', ['avatar_path' => 'something.jpg', 'country_iso' => $this->france->iso])->assignRole('ambassador');
        $this->get('/ambassadors?country_iso=' . $this->france->iso)->assertSee($ambassador_without_bio->lastname);

    }

    /** @test */
    public function get_ambassadors_for_a_country()
    {

        $this->withExceptionHandling();

        $this->get('/ambassadors?country_iso=BE')->assertSee($this->ambassador_be->lastname);
        $this->get('/ambassadors?country_iso=BE')->assertDontSee($this->ambassador_fr->lastname);
        $this->get('/ambassadors?country_iso=BE')->assertDontSee($this->admin_be->lastname);


    }

    /** @test */
    public function display_email_should_be_used_if_present()
    {

        $ambassador = create('App\User', ['country_iso' => $this->belgium->iso,'email_display'=>'foo@bar.com'])->assignRole('ambassador');

        $this->withExceptionHandling();

        $this->get('/ambassadors?country_iso=BE')->assertSee($ambassador->email_display);

        $this->get('/ambassadors?country_iso=BE')->assertDontSee($ambassador->email);


    }

    /** @test */
    public function signedin_users_should_see_their_country_ambassadors()
    {

        $this->signIn($this->ambassador_be);

        GeoIP::shouldReceive('getClientIP')
            ->never();


        $this->get('/ambassadors')->assertRedirect('/ambassadors?country_iso=' . $this->ambassador_be->country->iso);

    }

    /** @test */
    public function not_logged_users_should_see_their_country_ambassadors_based_on_geoIP()
    {
        GeoIP::shouldReceive('getClientIP')
            ->once()
            ->andReturn('text');
        $this->get('/ambassadors');
    }


    /** @test */
    public function ambassador_page_for_a_country_should_display_the_facebook_link()
    {

        create('App\Event', ['country_iso'=>'BE','status'=>'APPROVED']);


        $this->get('/ambassadors?country_iso=BE')->assertSee($this->belgium->facebook);


    }

    /** @test */
    public function info_email_should_be_displayed_in_footer_only_on_ambassadors_page()
    {

        $this->get('/ambassadors?country_iso=BE')->assertSee('mailto:info@codeweek.eu');


    }





}


