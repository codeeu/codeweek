<?php

namespace Tests\Feature;

use App\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class Codeweek4AllTest extends TestCase
{
    use DatabaseMigrations;

    //private $event;

    protected function setUp(): void
    {
        parent::setUp();

        $france = create(\App\Country::class, ['iso' => 'FR', 'name' => 'France']);
        $belgium = create(\App\Country::class, ['iso' => 'BE', 'name' => 'Belgium']);

        create(\App\Event::class, ['codeweek_for_all_participation_code' => 'cw19-foo', 'status' => 'APPROVED', 'participants_count' => 17, 'country_iso' => $france->iso, 'end_date' => Carbon::now()->subYear()], 15);
        create(\App\Event::class, ['codeweek_for_all_participation_code' => 'cw19-foo', 'status' => 'APPROVED', 'participants_count' => 17, 'country_iso' => $belgium->iso, 'end_date' => Carbon::now()->subYear()], 20);

    }

    /** @test */
    public function count_of_activities_should_be_visible()
    {
        $this->withoutExceptionHandling();
        $this->get(route('codeweek4all_details', ['code' => 'cw19-foo']))
            ->assertSee('31');

    }

    /** @test */
    public function count_of_participants_should_be_visible()
    {
        //dd(Event::all());

        $this->get(route('codeweek4all_details', ['code' => 'cw19-foo', 'edition' => Carbon::now()->year]))
            ->assertSee('595');

    }

    /** @test */
    public function count_of_unique_members_should_be_visible()
    {
        create(\App\Event::class, ['codeweek_for_all_participation_code' => 'cw19-bar', 'status' => 'APPROVED', 'creator_id' => 1, 'end_date' => Carbon::now()->subYear()], 2);
        create(\App\Event::class, ['codeweek_for_all_participation_code' => 'cw19-bar', 'status' => 'APPROVED', 'creator_id' => 2, 'end_date' => Carbon::now()->subYear()], 3);
        create(\App\Event::class, ['codeweek_for_all_participation_code' => 'cw19-bar', 'status' => 'APPROVED', 'creator_id' => 3, 'end_date' => Carbon::now()->subYear()], 11);

        $this->get(route('codeweek4all_details', ['code' => 'cw19-bar']))
            ->assertSee('Members: 3');

    }

    /** @test */
    public function countries_should_be_displayed()
    {
        $this->withoutExceptionHandling();
        $this->get(route('codeweek4all_details', ['code' => 'cw19-foo']))
            ->assertSeeInOrder(['Belgium', 'France'])
            ->assertDontSee('Bulgaria');
    }

    /** @test */
    public function reporting_percentage_should_be_displayed()
    {
        create(\App\Event::class, ['codeweek_for_all_participation_code' => 'cw19-reporting', 'status' => 'APPROVED', 'creator_id' => 1, 'reported_at' => Carbon::now(), 'end_date' => Carbon::now()->subYear()], 3);
        create(\App\Event::class, ['codeweek_for_all_participation_code' => 'cw19-reporting', 'status' => 'APPROVED', 'creator_id' => 2, 'end_date' => Carbon::now()->subYear()], 7);

        $this->withoutExceptionHandling();

        $this->get(route('codeweek4all_details', ['code' => 'cw19-reporting']))
            ->assertSee('30.00%');

    }

    /** @test */
    //    public function display_initiator()
    ////    {
    ////        $user1 = create('App\User', ['email' => 'foo@bar.com']);
    ////
    ////        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-initiator", "status" => "APPROVED", "creator_id" => 2, "created_at" => Carbon::now()]);
    ////        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-initiator", "status" => "APPROVED", "creator_id" => $user1->id, "created_at" => Carbon::now()->subDays(10)]);
    ////
    ////        $this->withoutExceptionHandling();
    ////
    ////        $this->get(route('codeweek4all_details', ['code' => 'cw19-initiator']))
    ////            ->assertSee('foo@bar.com');
    ////
    ////    }

}
