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

        $this->assertCount(2, $user->excellences);

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
  /*  public function reporting_should_update_name_in_database()
    {


        $user = create('App\User');
        create('App\Excellence', ['edition' => 2019, 'user_id' => $user->id]);

        $this->signIn($user);

        $request = [
            "name_for_certificate" => "foobar user"
        ];

        $this->post('/certificates/excellence/2019', $request)
            ->assertStatus(302);

        $excellence = Excellence::where('edition',"=",2019)->where('user_id',"=",auth()->id())->first();
        $this->assertEquals("foobar user",$excellence->name_for_certificate);


    }*/


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
    public function excellence_certificates_should_be_visible_on_certificates_page()
    {

        $user = create('App\User');

        $this->signIn($user);
        $name = "Tintin et Milou";

        create('App\Excellence', ['edition' => 2018, 'user_id' => $user->id,'name_for_certificate'=>$name]);


        $this->get('/certificates')
            ->assertSee($name);


    }




}


