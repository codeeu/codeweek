<?php

namespace Tests\Feature;

use App\School;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SchoolTest extends TestCase
{

    use DatabaseMigrations;
    /** @test */
    public function a_guest_can_not_create_school()
    {

        $this->withExceptionHandling();

        $this->get('/school/create')
            ->assertRedirect('/login');
        // $this->post('/events')
        //   ->assertRedirect('/login');

    }

    /** @test */
    public function an_authenticated_user_can_create_school()
    {
        $this->signIn();

        $school = make('App\School');


        $this->post('/school', $school->toArray());

        $this->assertDatabaseHas('schools', [
            'name' => $school->name
        ]);

        $school = School::where('name', $school->name)->first();

        $this->get($school->path())->assertSee($school->name);

    }

}


