<?php

namespace Tests\Feature;

use App\CertificateExcellence;
use App\Excellence;
use App\Helpers\ExcellenceWinnersHelper;
use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Torann\GeoIP\Facades\GeoIP;

class ExcellenceWinnersTest extends TestCase
{

    use DatabaseMigrations;

    private $ambassador_be;
    private $ambassador_fr;
    private $admin_be;
    private $belgium;
    private $france;
    private $italy;


    public function setup(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');

        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-500-participants-single", "status" => "APPROVED", "participants_count" => 500]);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-500-participants-multiple", "status" => "APPROVED", "participants_count" => 200]);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-500-participants-multiple", "status" => "APPROVED", "participants_count" => 300]);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-500-participants-multiple", "status" => "APPROVED", "participants_count" => 0]);


        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-no", "status" => "APPROVED", "participants_count" => 50]);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-rejected", "status" => "REJECTED", "participants_count" => 5000]);

        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-10-organisers", "status" => "APPROVED", "participants_count" => 60], 10);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-10-events-one-organiser", "status" => "APPROVED", "creator_id" => 1, "participants_count" => 20], 20);

        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-10-3-countries", "status" => "APPROVED", 'country_iso' => 'FR']);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-10-3-countries", "status" => "APPROVED", 'country_iso' => 'BE']);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-10-3-countries", "status" => "APPROVED", 'country_iso' => 'LU']);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-10-2-countries", "status" => "APPROVED", 'country_iso' => 'FR']);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-10-2-countries", "status" => "APPROVED", 'country_iso' => 'BE']);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-10-2-countries", "status" => "REJECTED", 'country_iso' => 'LU']);

        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-not-reported", "status" => "APPROVED", "participants_count" => NULL]);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-not-reported", "status" => "APPROVED", "participants_count" => NULL], 20);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-not-reported", "status" => "APPROVED", 'country_iso' => 'FR', "participants_count" => NULL]);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-not-reported", "status" => "APPROVED", 'country_iso' => 'BE', "participants_count" => NULL]);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-not-reported", "status" => "APPROVED", 'country_iso' => 'LU', "participants_count" => NULL]);



        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-multiple-years", "status" => "APPROVED", "participants_count" => 250, "end_date" => Carbon::now()->subYear()]);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-multiple-years", "status" => "APPROVED", "participants_count" => 250, "end_date" => Carbon::now()]);

        create('App\Event', ["codeweek_for_all_participation_code" => "cw18-previous-year", "status" => "APPROVED", "participants_count" => 5000, "end_date" => Carbon::now()->subYear()]);

    }


    /** @test */
    public function should_get_codes_with_500_students_or_more()
    {
        //Create the Events

        $codes = ExcellenceWinnersHelper::criteria1(2019);

        $this->assertContains("cw19-500-participants-single", $codes);
        $this->assertContains("cw19-500-participants-multiple", $codes);
        $this->assertNotContains("cw19-no", $codes);
        $this->assertNotContains("cw19-rejected", $codes);
        $this->assertNotContains("cw19-not-reported", $codes);
    }

    /** @test */
    public function should_get_codes_with_10_organisers_or_more()
    {


        $codes = ExcellenceWinnersHelper::criteria2(2019);


        $this->assertContains("cw19-10-organisers", $codes);
        $this->assertNotContains("cw19-10-events-one-organiser", $codes);
        $this->assertNotContains("cw19-500-participants-multiple", $codes);
        $this->assertNotContains("cw19-no", $codes);
        $this->assertNotContains("cw19-rejected", $codes);
        $this->assertNotContains("cw19-not-reported", $codes);
    }

    /** @test */
    public function should_get_three_countries_or_more()
    {

        $codes = ExcellenceWinnersHelper::criteria3(2019);

        $this->assertContains("cw19-10-3-countries", $codes);
        $this->assertNotContains("cw19-10-2-countries", $codes);
        $this->assertNotContains("cw19-10-organisers", $codes);
        $this->assertNotContains("cw19-10-events-one-organiser", $codes);
        $this->assertNotContains("cw19-500-participants-multiple", $codes);
        $this->assertNotContains("cw19-no", $codes);
        $this->assertNotContains("cw19-rejected", $codes);
        $this->assertNotContains("cw19-not-reported", $codes);
    }


    /** @test */
    public function should_get_winners_codes()
    {

        $codes = ExcellenceWinnersHelper::getWinnerCodes();

        $this->assertContains("cw19-500-participants-single", $codes);
        $this->assertContains("cw19-500-participants-multiple", $codes);
        $this->assertContains("cw19-10-organisers", $codes);
        $this->assertContains("cw19-10-3-countries", $codes);
        $this->assertNotContains("cw19-no", $codes);
        $this->assertNotContains("cw19-rejected", $codes);
        $this->assertNotContains("cw19-multiple-years", $codes);
        $this->assertNotContains("cw18-previous-year", $codes);
        $this->assertNotContains("cw19-not-reported", $codes);

        $this->assertEquals($codes, $codes->unique());


    }

    /** @test */
    public function should_get_winners_codes_for_specific_year()
    {

        $codes = ExcellenceWinnersHelper::getWinnerCodes(Carbon::now()->subYear()->get('year'));

        $this->assertNotContains("cw19-500-participants-single", $codes);
        $this->assertNotContains("cw19-500-participants-multiple", $codes);
        $this->assertNotContains("cw19-10-organisers", $codes);
        $this->assertNotContains("cw19-10-3-countries", $codes);
        $this->assertNotContains("cw19-no", $codes);
        $this->assertNotContains("cw19-rejected", $codes);
        $this->assertNotContains("cw19-multiple-years", $codes);
        $this->assertContains("cw18-previous-year", $codes);

        $this->assertEquals($codes, $codes->unique());


    }

    /** @test */
    public function should_get_winners_codes_details()
    {

        $codes = ExcellenceWinnersHelper::getWinnerCodes();

        $details = ExcellenceWinnersHelper::getDetailsByCodeweek4All($codes->toArray());

        $this->assertTrue($details->contains(function ($line) {
            return($line->codeweek_for_all_participation_code == "cw19-10-3-countries");
        }));


    }


}


