<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Event;
use App\Http\Controllers\UserController;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DatabaseMigrationUserTest extends TestCase
{
    use DatabaseMigrations;

    private $ambassador_be;

    private $ambassador_fr;

    private $admin_be;

    private $belgium;

    private $france;

    #[Test]
    public function users_with_same_email_should_be_merged(): void
    {

        //$this->withExceptionHandling();

        //Given we have two or more user records with the same email
        \App\User::factory()->count(2)->create(['email' => 'foobar']);
        \App\User::factory()->create(['email' => 'someone_else']);

        $users = User::all();
        $this->assertCount(3, $users);

        //With events bound to each user
        \App\Event::factory()->create(['creator_id' => $users[0]->id]);
        \App\Event::factory()->count(2)->create(['creator_id' => $users[1]->id]);
        \App\Event::factory()->count(3)->create(['creator_id' => $users[2]->id]);

        $events = Event::all();
        $this->assertCount(6, $events);
        $this->assertCount(1, $users[0]->events);
        $this->assertCount(2, $users[1]->events);

        //We have to clean the data and keep only one user with all the events linked
        UserController::mergeEvents();

        $user = User::where('email', 'foobar')->first();
        $this->signIn($user);

        $this->assertCount(3, auth()->user()->events);

        $this->assertCount(2, User::all());

    }

    #[Test]
    public function should_get_the_main_user_when_user_has_two_roles(): void
    {

        $this->seed('RolesAndPermissionsSeeder');

        $admin_only = \App\User::factory()->create(['email' => 'foo'])->assignRole('ambassador');
        $admin_ambassador = \App\User::factory()->create(['email' => 'foo'])->assignRole('super admin')->assignRole('ambassador');

        $main_user = UserController::getMainAccount('foo');

        $this->assertEquals($admin_ambassador->firstname, $main_user->firstname);

        //$this->

    }

    #[Test]
    public function should_get_the_main_user_when_user_is_ambassador(): void
    {

        $this->seed('RolesAndPermissionsSeeder');

        $no_role = \App\User::factory()->count(3)->create(['email' => 'foo']);
        $ambassador = \App\User::factory()->create(['email' => 'foo'])->assignRole('ambassador');

        $main_user = UserController::getMainAccount('foo');

        $this->assertEquals($ambassador->firstname, $main_user->firstname);

        //$this->

    }

    #[Test]
    public function should_get_the_main_user_when_user_is_ambassador_with_more_data(): void
    {

        $this->seed('RolesAndPermissionsSeeder');

        $ambassador1 = \App\User::factory()->create(['email' => 'foo', 'twitter' => ''])->assignRole('ambassador');
        $ambassador2 = \App\User::factory()->create(['email' => 'foo'])->assignRole('ambassador');

        $main_user = UserController::getMainAccount('foo');

        $this->assertEquals($ambassador2->firstname, $main_user->firstname);

        //$this->

    }
}
