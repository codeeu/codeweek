<?php

namespace Tests\Feature;

use App\Certificate;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CertificateGenerationTest extends TestCase
{

    use DatabaseMigrations;


    protected $event;

    public function setup():void
    {
        parent::setUp();

        $this->seed('RolesAndPermissionsSeeder');
        $this->event = create('App\Event', ["status"=>"APPROVED","start_date"=>Carbon::now()->subMonth(1)]);


    }

    /** @test */
    public function it_should_escape_special_characters() {


        $certificate = new Certificate($this->event);
        $expected = "foo''bar \# \\$ \% \& \~{} \_ \^{} \\textbackslash \{ \}";
        $this->assertEquals($expected, $certificate->tex_escape("foo\"bar # $ % & ~ _ ^ \\ { }"));

    }
}
