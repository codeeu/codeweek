<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Helpers\Codeweek4AllHelper;
use App\Helpers\ExcellenceWinnersHelper;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Carbon;
use Tests\TestCase;

final class ExcellenceWinnersTest extends TestCase
{
    use DatabaseMigrations;

    private $ambassador_be;

    private $ambassador_fr;

    private $admin_be;

    private $belgium;

    private $france;

    private $italy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');

        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-500-participants-single', 'status' => 'APPROVED', 'participants_count' => 500, 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-500-participants-multiple', 'status' => 'APPROVED', 'participants_count' => 200, 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-500-participants-multiple', 'status' => 'APPROVED', 'participants_count' => 300, 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-500-participants-multiple', 'status' => 'APPROVED', 'participants_count' => 0, 'end_date' => Carbon::now()->year(2019)]);

        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-no', 'status' => 'APPROVED', 'participants_count' => 50, 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-rejected', 'status' => 'REJECTED', 'participants_count' => 5000, 'end_date' => Carbon::now()->year(2019)]);

        \App\Event::factory()->count(10)->create(['codeweek_for_all_participation_code' => 'cw19-10-organisers', 'status' => 'APPROVED', 'participants_count' => 60, 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->count(20)->create(['codeweek_for_all_participation_code' => 'cw19-10-events-one-organiser', 'status' => 'APPROVED', 'creator_id' => 1, 'participants_count' => 20, 'end_date' => Carbon::now()->year(2019)]);

        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-10-3-countries', 'status' => 'APPROVED', 'country_iso' => 'FR', 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-10-3-countries', 'status' => 'APPROVED', 'country_iso' => 'BE', 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-10-3-countries', 'status' => 'APPROVED', 'country_iso' => 'LU', 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-10-2-countries', 'status' => 'APPROVED', 'country_iso' => 'FR', 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-10-2-countries', 'status' => 'APPROVED', 'country_iso' => 'BE', 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-10-2-countries', 'status' => 'REJECTED', 'country_iso' => 'LU', 'end_date' => Carbon::now()->year(2019)]);

        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-not-reported', 'status' => 'APPROVED', 'participants_count' => null, 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->count(20)->create(['codeweek_for_all_participation_code' => 'cw19-not-reported', 'status' => 'APPROVED', 'participants_count' => null, 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-not-reported', 'status' => 'APPROVED', 'country_iso' => 'FR', 'participants_count' => null, 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-not-reported', 'status' => 'APPROVED', 'country_iso' => 'BE', 'participants_count' => null, 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-not-reported', 'status' => 'APPROVED', 'country_iso' => 'LU', 'participants_count' => null, 'end_date' => Carbon::now()->year(2019)]);

        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-multiple-years', 'status' => 'APPROVED', 'participants_count' => 250, 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw19-multiple-years', 'status' => 'APPROVED', 'participants_count' => 250, 'end_date' => Carbon::now()->year(2018)]);

        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw18-previous-year', 'status' => 'APPROVED', 'country_iso' => 'FR', 'end_date' => Carbon::now()->year(2018)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw18-previous-year', 'status' => 'APPROVED', 'country_iso' => 'BE', 'end_date' => Carbon::now()->year(2018)]);
        \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'cw18-previous-year', 'status' => 'APPROVED', 'country_iso' => 'LU', 'end_date' => Carbon::now()->year(2018)]);

        \App\Event::factory()->count(10)->create(['codeweek_for_all_participation_code' => 'cw19-everything', 'status' => 'APPROVED', 'participants_count' => 50, 'country_iso' => 'LU', 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->count(10)->create(['codeweek_for_all_participation_code' => 'cw19-everything', 'status' => 'APPROVED', 'participants_count' => 50, 'country_iso' => 'BE', 'end_date' => Carbon::now()->year(2019)]);
        \App\Event::factory()->count(10)->create(['codeweek_for_all_participation_code' => 'cw19-everything', 'status' => 'APPROVED', 'participants_count' => 50, 'country_iso' => 'FR', 'end_date' => Carbon::now()->year(2019)]);

    }

    #[Test]
    public function should_get_codes_with_500_students_or_more(): void
    {
        //Create the Events

        $codes = ExcellenceWinnersHelper::criteria1(2019);

        $this->assertContains('cw19-500-participants-single', $codes);
        $this->assertContains('cw19-500-participants-multiple', $codes);
        $this->assertNotContains('cw19-no', $codes);
        $this->assertNotContains('cw19-rejected', $codes);
        $this->assertNotContains('cw19-not-reported', $codes);
    }

    #[Test]
    public function should_get_codes_with_10_organisers_or_more(): void
    {

        $codes = ExcellenceWinnersHelper::criteria2(2019);

        $this->assertContains('cw19-10-organisers', $codes);
        $this->assertNotContains('cw19-10-events-one-organiser', $codes);
        $this->assertNotContains('cw19-500-participants-multiple', $codes);
        $this->assertNotContains('cw19-no', $codes);
        $this->assertNotContains('cw19-rejected', $codes);
        $this->assertNotContains('cw19-not-reported', $codes);
    }

    #[Test]
    public function should_get_three_countries_or_more(): void
    {

        $codes = ExcellenceWinnersHelper::criteria3(2019);

        $this->assertContains('cw19-10-3-countries', $codes);
        $this->assertNotContains('cw19-10-2-countries', $codes);
        $this->assertNotContains('cw19-10-organisers', $codes);
        $this->assertNotContains('cw19-10-events-one-organiser', $codes);
        $this->assertNotContains('cw19-500-participants-multiple', $codes);
        $this->assertNotContains('cw19-no', $codes);
        $this->assertNotContains('cw19-rejected', $codes);
        $this->assertNotContains('cw19-not-reported', $codes);
    }

    #[Test]
    public function should_get_winners_codes(): void
    {

        $codes = ExcellenceWinnersHelper::getWinnerCodes(2019);

        $this->assertNotContains('cw19-500-participants-single', $codes);
        $this->assertNotContains('cw19-500-participants-multiple', $codes);
        $this->assertContains('cw19-10-organisers', $codes);
        $this->assertContains('cw19-10-3-countries', $codes);
        $this->assertContains('cw19-everything', $codes);
        $this->assertNotContains('cw19-no', $codes);
        $this->assertNotContains('cw19-rejected', $codes);
        $this->assertNotContains('cw19-multiple-years', $codes);
        $this->assertNotContains('cw18-previous-year', $codes);
        $this->assertNotContains('cw19-not-reported', $codes);

        $this->assertEquals($codes, $codes->unique());

    }

    #[Test]
    public function should_get_winners_codes_for_specific_year(): void
    {

        $codes = ExcellenceWinnersHelper::getWinnerCodes(2018);

        $this->assertNotContains('cw19-500-participants-single', $codes);
        $this->assertNotContains('cw19-500-participants-multiple', $codes);
        $this->assertNotContains('cw19-10-organisers', $codes);
        $this->assertNotContains('cw19-10-3-countries', $codes);
        $this->assertNotContains('cw19-no', $codes);
        $this->assertNotContains('cw19-rejected', $codes);
        $this->assertNotContains('cw19-multiple-years', $codes);
        $this->assertContains('cw18-previous-year', $codes);

        $this->assertEquals($codes, $codes->unique());

    }

    #[Test]
    public function should_get_winners_codes_details(): void
    {

        $codes = ExcellenceWinnersHelper::getWinnerCodes(2019);

        $details = Codeweek4AllHelper::getDetailsByCodeweek4All($codes->toArray(), 2019);

        $this->assertTrue($details->contains(function ($line) {
            return $line->codeweek_for_all_participation_code == 'cw19-10-3-countries';
        }));

    }

    #[Test]
    public function should_get_winners_fulfilling_all_criteria(): void
    {

        $codes = ExcellenceWinnersHelper::getWinnerCodes(2019);

        $details = Codeweek4AllHelper::getDetailsByCodeweek4All($codes->toArray(), 2019);

        $full = ExcellenceWinnersHelper::tagSuperWinners($details, false);

        $this->assertTrue($full->contains(function ($line) {
            return $line->codeweek_for_all_participation_code == 'cw19-everything' && $line->super_winner == 1;
        }));

    }
}
