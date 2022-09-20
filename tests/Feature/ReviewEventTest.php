<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;


class ReviewEventTest extends TestCase
{

    use DatabaseMigrations;


    public function setup() :void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
    }

    /** @test */
    public function ambassadors_of_right_country_can_see_the_review_section()
    {
        $ambassador = create('App\User', ['country_iso' => 'FR'])->assignRole('ambassador');
        $this->signIn($ambassador);

        $event = create('App\Event', ['country_iso' => 'FR', 'status' => 'PENDING'],33);

        $this->get('/view/' . $event[30]->id . '/random')
            ->assertSee('moderate-event');

    }

    /** @test */
    public function visitors_cant_see_the_review_section()
    {
        $visitor = create('App\User', ['country_iso' => 'FR']);
        $this->signIn($visitor);

        $event = create('App\Event', ['country_iso' => 'FR', 'status' => 'PENDING']);

        $this->get('/view/' . $event->id . '/random')
            ->assertDontSee('moderate-event');

    }







}


