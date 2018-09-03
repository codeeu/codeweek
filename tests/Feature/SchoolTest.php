<?php
//
//namespace Tests\Feature;
//
//use App\School;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Tests\TestCase;
//use Illuminate\Foundation\Testing\WithFaker;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//
//class SchoolTest extends TestCase
//{
//
//    use DatabaseMigrations;
//
//    /** @test */
//    public function a_guest_can_not_create_school()
//    {
//
//        $this->withExceptionHandling();
//
//        $this->get('/school/create')
//            ->assertRedirect('/login');
//        // $this->post('/events')
//        //   ->assertRedirect('/login');
//
//    }
//
//    /** @test */
//    public function an_authenticated_user_can_create_school()
//    {
//        $this->signIn();
//
//        $school = make('App\School');
//
//
//        $this->post('/school', $school->toArray());
//
//        $this->assertDatabaseHas('schools', [
//            'name' => $school->name
//        ]);
//
//        $school = School::where('name', $school->name)->first();
//
//        $this->get($school->path())
//            ->assertSee($school->name);
//        $user = $school->users->first();
//
//        $this->assertEquals($user->name, auth()->user()->name);
//
//
//    }
//
//    /** @test */
//    function school_can_have_multiple_members()
//    {
//        $this->signIn(create('App\User', ['firstname'=>'John','lastname' => 'Doe']));
//
//        $this->assertEquals(sizeof(auth()->user()->schools), 0);
//        $school = create('App\School');
//
//        $school->users()->attach(create('App\User', [], 3));
//
//        $this->assertEquals(sizeof($school->users), 3);
//
//    }
//
//    /** @test */
//    function user_can_be_member_of_multiple_schools()
//    {
//        $this->signIn(create('App\User', ['firstname'=>'John','lastname' => 'Doe']));
//
//        $this->assertEquals(sizeof(auth()->user()->schools), 0);
//
//        auth()->user()->schools()->attach(create('App\School', [], 4));
//
//        $this->assertEquals(sizeof(auth()->user()->fresh()->schools), 4);
//
//
//    }
//
//
//}
//
//
