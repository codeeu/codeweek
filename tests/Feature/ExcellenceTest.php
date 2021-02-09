<?php

namespace Tests\Feature;

use App\CertificateExcellence;
use App\Excellence;
use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Torann\GeoIP\Facades\GeoIP;

class ExcellenceTest extends TestCase
{

    use DatabaseMigrations;

    private $ambassador_be;
    private $ambassador_fr;
    private $admin_be;
    private $belgium;
    private $france;
    private $italy;


    public function setup():void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');


    }


    /** @test */
    public function user_can_have_a_certificate_of_excellence()
    {

        $user = create('App\User');

        create('App\Excellence', ['edition' => 2018, 'user_id' => $user->id]);
        create('App\Excellence', ['edition' => 2019, 'user_id' => $user->id]);
        create('App\Excellence', ['edition' => 2019, 'user_id' => $user->id, 'type' => 'SuperOrganiser']);

        $this->assertCount(2, $user->excellences);

    }

    /** @test */
    public function user_can_have_a_super_organiser_certificate()
    {

        $user = create('App\User');

        create('App\Excellence', ['edition' => 2018, 'user_id' => $user->id]);
        create('App\Excellence', ['edition' => 2019, 'user_id' => $user->id]);
        create('App\Excellence', ['edition' => 2019, 'user_id' => $user->id, 'type' => 'SuperOrganiser']);

        $this->assertCount(1, $user->superOrganisers);

    }

    /** @test */
    public function should_get_all_users_with_excellence_for_specific_edition()
    {

        create('App\Excellence', ['edition' => 2018], 10);
        create('App\Excellence', ['edition' => 2019], 20);

        $filtered = Excellence::byYear(2018);


        $this->assertCount(10, $filtered);

    }

    /** @test */
    public function user_should_not_have_excellence()
    {

        $user = create('App\User');

        create('App\Excellence', ['edition' => 2019, 'user_id' => $user->id]);

        $excellences = $user->excellences;

        $count = $excellences->filter(
            function ($value, $key) use ($user) {
                return $value->edition == 2018;
            }
        );

        $this->assertCount(0, $count);

    }

    /** @test */
    public function winner_can_report_for_Excellence()
    {

        $user = create('App\User');
        create('App\Excellence', ['edition' => 2019, 'user_id' => $user->id]);

        $this->signIn($user);

        $this->get('/certificates/excellence/2019')
            ->assertStatus(200);


    }

    /** @test */
    public function winner_can_report_for_super_organiser()
    {

        $user = create('App\User');
        create('App\Excellence', ['edition' => 2020, 'user_id' => $user->id, 'type' => 'SuperOrganiser']);

        $this->signIn($user);

        $this->get('/certificates/super-organiser/2020')
            ->assertStatus(200);


    }




    /** @test */
    public function non_winner_cant_report_for_Excellence()
    {

        $user = create('App\User');

        $this->signIn($user);

        $this->get('/certificates/excellence/2019')
            ->assertStatus(403);

        $this->post('/certificates/excellence/2019')
            ->assertStatus(403);


    }

    /** @test */
    public function non_winner_cant_report_for_super_organiser()
    {

        $user = create('App\User');

        $this->signIn($user);

        $this->get('/certificates/super-organiser/2019')
            ->assertStatus(403);

        $this->post('/certificates/super-organiser/2019')
            ->assertStatus(403);


    }

    /** @test */
    public function excellence_certificates_should_be_visible_on_certificates_page()
    {

        $user = create('App\User');

        $this->signIn($user);
        $name = "Tintin et Milou";

        create('App\Excellence', ['edition' => 2018, 'user_id' => $user->id,'name_for_certificate'=>$name]);


        $this->get('/certificates')
            ->assertSee($name);


    }

    /** @test */
    public function super_organiser_certificates_should_be_visible_on_certificates_page()
    {

        $user = create('App\User');

        $this->signIn($user);
        $name = "Bob et Bobette";

        create('App\Excellence', ['edition' => 2020, 'user_id' => $user->id,'name_for_certificate'=>$name, 'type'=>'SuperOrganiser']);


        $this->get('/certificates')
            ->assertSee("Super Organiser Certificate 2020")
            ->assertSee($name);


    }

    /** @test */
    public function excellence_certificates_should_be_visible_on_certificates_page_only_when_reported()
    {

        $user = create('App\User');

        $this->signIn($user);
        $name = NULL;

        create('App\Excellence', ['edition' => 2017, 'user_id' => $user->id,'name_for_certificate'=>$name]);
        create('App\Excellence', ['edition' => 2018, 'user_id' => $user->id,'name_for_certificate'=>$name]);


        $this->get('/certificates')
            ->assertSee("Claim your certificate of excellence for 2017")
            ->assertSee("Claim your certificate of excellence for 2018")
            ->assertDontSee("Claim your certificate of excellence for 2020");


    }

    /** @test */
    public function super_organiser_certificates_should_be_visible_on_certificates_page_only_when_reported()
    {

        $user = create('App\User');

        $this->signIn($user);
        $name = NULL;

        create('App\Excellence', ['edition' => 2020, 'user_id' => $user->id,'name_for_certificate'=>$name, 'type' => "SuperOrganiser"]);


        $this->get('/certificates')
            ->assertSee("Claim your super organiser certificate for 2020");



    }






}


