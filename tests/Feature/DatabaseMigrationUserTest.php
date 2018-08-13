<?php

namespace Tests\Feature;

use App\Event;
use App\Http\Controllers\UserController;
use App\School;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseMigrationUserTest extends TestCase
{

    use DatabaseMigrations;

    private $ambassador_be;
    private $ambassador_fr;
    private $admin_be;
    private $belgium;
    private $france;


    /** @test */
    public function users_with_same_email_should_be_merged()
    {

        //$this->withExceptionHandling();

        //Given we have two or more user records with the same email
        create('App\User', ['email' => 'foobar'], 2);
        create('App\User', ['email' => 'someone_else']);

        $users = User::all();
        $this->assertCount(3, $users);

        //With events bound to each user
        create('App\Event', ['creator_id' => $users[0]->id]);
        create('App\Event', ['creator_id' => $users[1]->id], 2);
        create('App\Event', ['creator_id' => $users[2]->id],3);

        $events = Event::all();
        $this->assertCount(6, $events);
        $this->assertCount(1, $users[0]->events);
        $this->assertCount(2, $users[1]->events);

        //We have to clean the data and keep only one user with all the events linked
        UserController::mergeEvents();

        $user = User::where("email", "foobar")->first();
        $this->signIn($user);

        $this->assertCount(3, auth()->user()->events);

        $this->assertCount(2, User::all());


    }

    /** @test */
    public function should_get_the_main_user_when_user_has_two_roles(){

        $this->seed('RolesAndPermissionsSeeder');

        $admin_only = create('App\User', ['email'=>'foo'])->assignRole('ambassador');
        $admin_ambassador = create('App\User', ['email' => 'foo'])->assignRole('super admin')->assignRole('ambassador');



        $main_user = UserController::getMainAccount('foo');

        $this->assertEquals($admin_ambassador->firstname, $main_user->firstname);

        //$this->


    }

    /** @test */
    public function should_get_the_main_user_when_user_is_ambassador(){

        $this->seed('RolesAndPermissionsSeeder');

        $no_role = create('App\User', ['email'=>'foo'],3);
        $ambassador = create('App\User', ['email'=>'foo'])->assignRole('ambassador');


        $main_user = UserController::getMainAccount('foo');

        $this->assertEquals($ambassador->firstname, $main_user->firstname);

        //$this->


    }

    /** @test */
    public function should_get_the_main_user_when_user_is_ambassador_with_more_data(){

        $this->seed('RolesAndPermissionsSeeder');


        $ambassador1 = create('App\User', ['email'=>'foo','twitter'=>''])->assignRole('ambassador');
        $ambassador2 = create('App\User', ['email'=>'foo'])->assignRole('ambassador');


        $main_user = UserController::getMainAccount('foo');

        $this->assertEquals($ambassador2->firstname, $main_user->firstname);

        //$this->


    }


}


