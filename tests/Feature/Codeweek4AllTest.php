<?php

namespace Tests\Feature;

use App\Country;
use App\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;


class Codeweek4AllTest extends TestCase
{
    use DatabaseMigrations;


    //private $event;

    public function setup(): void
    {
        parent::setUp();

        $france = create('App\Country', ['iso' => 'FR', 'name' => "France"]);
        $belgium = create('App\Country', ['iso' => 'BE', 'name' => 'Belgium']);

        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-foo", "status" => "APPROVED", "participants_count" => 17, "country_iso" => $france->iso], 15);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-foo", "status" => "APPROVED", "participants_count" => 17, "country_iso" => $belgium->iso], 20);

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

        $this->get(route('codeweek4all_details', ['code' => 'cw19-foo']))
            ->assertSee('595');

    }

    /** @test */
    public function count_of_unique_members_should_be_visible()
    {
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-bar", "status" => "APPROVED", "creator_id" => 1], 2);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-bar", "status" => "APPROVED", "creator_id" => 2], 3);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-bar", "status" => "APPROVED", "creator_id" => 3], 11);


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
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-reporting", "status" => "APPROVED", "creator_id" => 1, "reported_at" => Carbon::now()], 3);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-reporting", "status" => "APPROVED", "creator_id" => 2], 7);

        $this->withoutExceptionHandling();

        $this->get(route('codeweek4all_details', ['code' => 'cw19-reporting']))
            ->assertSee('30.00%');

    }

    /** @test */
    public function dispaly_initiator()
    {
        $user1 = create('App\User', ['email' => 'foo@bar.com']);

        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-initiator", "status" => "APPROVED", "creator_id" => 2, "created_at" => Carbon::now()]);
        create('App\Event', ["codeweek_for_all_participation_code" => "cw19-initiator", "status" => "APPROVED", "creator_id" => $user1->id, "created_at" => Carbon::now()->subDays(10)]);

        $this->withoutExceptionHandling();

        $this->get(route('codeweek4all_details', ['code' => 'cw19-initiator']))
            ->assertSee('foo@bar.com');

    }


}
