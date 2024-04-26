<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

final class Codeweek4AllTest extends TestCase
{
    use DatabaseMigrations;

    //private $event;

    protected function setUp(): void
    {
        parent::setUp();

        $france = \App\Country::factory()->create(['iso' => 'FR', 'name' => 'France']);
        $belgium = \App\Country::factory()->create(['iso' => 'BE', 'name' => 'Belgium']);

        \App\Event::factory()->count(15)->create(['codeweek_for_all_participation_code' => 'cw19-foo', 'status' => 'APPROVED', 'participants_count' => 17, 'country_iso' => $france->iso, 'end_date' => Carbon::now()->subYear()]);
        \App\Event::factory()->count(20)->create(['codeweek_for_all_participation_code' => 'cw19-foo', 'status' => 'APPROVED', 'participants_count' => 17, 'country_iso' => $belgium->iso, 'end_date' => Carbon::now()->subYear()]);

    }

    #[Test]
    public function count_of_activities_should_be_visible(): void
    {
        $this->withoutExceptionHandling();
        $this->get(route('codeweek4all_details', ['code' => 'cw19-foo']))
            ->assertSee('31');

    }

    #[Test]
    public function count_of_participants_should_be_visible(): void
    {
        //dd(Event::all());

        $this->get(route('codeweek4all_details', ['code' => 'cw19-foo', 'edition' => Carbon::now()->year]))
            ->assertSee('595');

    }

    #[Test]
    public function count_of_unique_members_should_be_visible(): void
    {
        \App\Event::factory()->count(2)->create(['codeweek_for_all_participation_code' => 'cw19-bar', 'status' => 'APPROVED', 'creator_id' => 1, 'end_date' => Carbon::now()->subYear()]);
        \App\Event::factory()->count(3)->create(['codeweek_for_all_participation_code' => 'cw19-bar', 'status' => 'APPROVED', 'creator_id' => 2, 'end_date' => Carbon::now()->subYear()]);
        \App\Event::factory()->count(11)->create(['codeweek_for_all_participation_code' => 'cw19-bar', 'status' => 'APPROVED', 'creator_id' => 3, 'end_date' => Carbon::now()->subYear()]);

        $this->get(route('codeweek4all_details', ['code' => 'cw19-bar']))
            ->assertSee('Members: 3');

    }

    #[Test]
    public function countries_should_be_displayed(): void
    {
        $this->withoutExceptionHandling();
        $this->get(route('codeweek4all_details', ['code' => 'cw19-foo']))
            ->assertSeeInOrder(['Belgium', 'France'])
            ->assertDontSee('Bulgaria');
    }

    #[Test]
    public function reporting_percentage_should_be_displayed(): void
    {
        \App\Event::factory()->count(3)->create(['codeweek_for_all_participation_code' => 'cw19-reporting', 'status' => 'APPROVED', 'creator_id' => 1, 'reported_at' => Carbon::now(), 'end_date' => Carbon::now()->subYear()]);
        \App\Event::factory()->count(7)->create(['codeweek_for_all_participation_code' => 'cw19-reporting', 'status' => 'APPROVED', 'creator_id' => 2, 'end_date' => Carbon::now()->subYear()]);

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
