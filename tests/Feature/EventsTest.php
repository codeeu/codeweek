<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;


class EventsTest extends TestCase
{
    use DatabaseMigrations;


    private $event;

    public function setup()
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->event = create('App\Event', ["country_iso" => create('App\Country')->iso, "status"=>"APPROVED"]);

        $this->event->audiences()->saveMany(factory('App\Audience', 3)->make());
        $this->event->themes()->saveMany(factory('App\Theme', 3)->make());
        $this->event->tags()->saveMany(factory('App\Tag', 3)->make());

    }

    /** @test */
    public function a_user_can_browse_approved_events()
    {

        $this->get('/view/' . $this->event->id . '/random')
            ->assertSee($this->event->title);
    }

    /** @test */
    public function a_user_cant_browse_non_approved_events()
    {
        $this->event->update(['status'=>'REJECTED']);
        $this->get('/view/' . $this->event->id . '/random')
            ->assertStatus(403);
    }

    /** @test */
    public function an_event_has_an_organizer()
    {

        $this->get('/view/' . $this->event->id . '/random')
            ->assertSee($this->event->organizer);
    }


    /** @test */
    public function a_user_can_see_audiences_associated_with_events()
    {

        foreach ($this->event->audiences()->get() as &$value) {
            $this->get('/view/' . $this->event->id . '/random')
                ->assertSee($value->name);
        }

    }

    /** @test */
    public function a_user_can_see_themes_associated_with_events()
    {

        foreach ($this->event->themes()->get() as &$value) {
            $this->get('/view/' . $this->event->id . '/random')
                ->assertSee($value->name);
        }

    }

    /** @test */
    public function a_user_can_see_tags_associated_with_events()
    {

        foreach ($this->event->tags()->get() as &$value) {
            $this->get('/view/' . $this->event->id . '/random')
                ->assertSee($value->name);
        }

    }

    /** @test */
    public function visitors_cant_see_the_user_email()
    {

        $event = create('App\Event', ["user_email"=>"foo@bar.com","country_iso" => create('App\Country')->iso, "status"=>"APPROVED"]);

        $this->get('/view/' . $event->id . '/random')
            ->assertDontSee('foo@bar.com');

    }

    /** @test */
    public function ambassadors_from_other_countries_cant_see_the_user_email()
    {

        $ambassador = create('App\User', ['country_iso' => 'FR'])->assignRole('ambassador');
        $this->signIn($ambassador);

        $event = create('App\Event', ["user_email"=>"foo@bar.com","country_iso" => "BE", "status"=>"APPROVED"]);

        $this->get('/view/' . $event->id . '/random')
            ->assertDontSee('foo@bar.com');

    }

    /** @test */
    public function ambassadors_from_same_country_can_see_the_user_email()
    {

        $ambassador = create('App\User', ['country_iso' => 'FR'])->assignRole('ambassador');
        $this->signIn($ambassador);

        $event = create('App\Event', ["user_email"=>"foo@bar.com","country_iso" => "FR", "status"=>"APPROVED"]);

        $this->get('/view/' . $event->id . '/random')
            ->assertSee('foo@bar.com');

    }

    /** @test */
    public function admins_can_see_the_user_email()
    {

        $admin = create('App\User')->assignRole('super admin');
        $this->signIn($admin);

        $event = create('App\Event', ["user_email"=>"foo@bar.com", "status"=>"APPROVED"]);

        $this->get('/view/' . $event->id . '/random')
            ->assertSee('foo@bar.com');

    }


}
