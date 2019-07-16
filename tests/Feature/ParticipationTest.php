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

class ParticipationTest extends TestCase
{

    use DatabaseMigrations;


    /** @test */
    public function anonymous_users_cant_create_participation_certificate()
    {

        $this->get(route('participation'))->assertRedirect('/login');




    }

    /** @test */
    public function user_can_have_a_certificate_of_participation()
    {

        $user = create('App\User');


        create('App\Participation', ['user_id' => $user->id]);
        create('App\Participation', ['user_id' => $user->id]);

        $this->assertCount(2, $user->participations);

    }

    /** @test */
    public function user_should_be_allowed_to_download_certificate()
    {

        $user = create('App\User');
        $this->signIn($user);


        $participation = create('App\Participation', ['user_id' => $user->id]);

        $this->get(route('certificates'))->assertSee($participation->participation_url);



    }

    /** @test */
    public function user_should_only_see_their_certificates()
    {

        $user = create('App\User');
        $this->signIn($user);


        $participation = create('App\Participation');
        $myParticipation = create('App\Participation', ['user_id' => $user->id]);

        $this->get(route('certificates'))->assertSee($myParticipation->participation_url);
        $this->get(route('certificates'))->assertDontSee($participation->participation_url);



    }





}


