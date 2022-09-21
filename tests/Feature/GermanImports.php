<?php

namespace Tests\Feature;

use App\Event;
use App\Helpers\ImporterHelper;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GermanImports extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_should_not_be_listed_as_imported()
    {

        $event = create('App\Event', ["codeweek_for_all_participation_code" => "random"]);

        $this->assertFalse($event->imported());

    }

    /** @test */
    function it_should_be_listed_as_imported()
    {
        $this->assertTrue(create('App\Event', ["codeweek_for_all_participation_code" => "cw22-hamburg"])->imported());
        $this->assertTrue(create('App\Event', ["codeweek_for_all_participation_code" => "cw22-baden"])->imported());
        $this->assertTrue(create('App\Event', ["codeweek_for_all_participation_code" => "cw22-bonn"])->imported());
        $this->assertTrue(create('App\Event', ["codeweek_for_all_participation_code" => "cw22-berlin"])->imported());
        $this->assertTrue(create('App\Event', ["codeweek_for_all_participation_code" => "cw22-leipzig"])->imported());
        $this->assertTrue(create('App\Event', ["codeweek_for_all_participation_code" => "cw22-dresden"])->imported());
        $this->assertTrue(create('App\Event', ["codeweek_for_all_participation_code" => "cw22-thueringen"])->imported());
        $this->assertTrue(create('App\Event', ["codeweek_for_all_participation_code" => "cw22-bremen"])->imported());
        $this->assertTrue(create('App\Event', ["codeweek_for_all_participation_code" => "cw22-muensterland"])->imported());
        $this->assertTrue(create('App\Event', ["codeweek_for_all_participation_code" => "cw22-nordhessen"])->imported());
        $this->assertTrue(create('App\Event', ["codeweek_for_all_participation_code" => "cw22-bayern"])->imported());

    }




}
