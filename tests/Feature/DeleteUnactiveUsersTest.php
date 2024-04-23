<?php

namespace Tests\Feature;

use App\Helpers\UserHelper;
use App\Mail\DeletedUsers;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DeleteUnactiveUsersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function delete_user_unactive_more_than_5_years_ago(): void
    {
        $user = create(\App\User::class, ['updated_at' => Carbon::now()->subYear(6)]);
        $this->artisan('delete:unactiveusers');
        $this->assertTrue($user->fresh()->trashed());
    }

    /** @test */
    public function delete_user_unactive_5_years_ago(): void
    {
        $user = create(\App\User::class, ['updated_at' => Carbon::now()->subYear(5)]);
        $this->artisan('delete:unactiveusers');
        $this->assertTrue($user->fresh()->trashed());
    }

    /** @test */
    public function dont_delete_user_active(): void
    {
        $user = create(\App\User::class, ['updated_at' => Carbon::now()->subYear(4)]);
        $this->artisan('delete:unactiveusers');
        $this->assertFalse($user->fresh()->trashed());
    }

    /** @test */
    public function delete_only_unactive_users(): void
    {
        $unactive_user1 = create(\App\User::class, ['updated_at' => Carbon::now()->subYear(6)]);
        $unactive_user2 = create(\App\User::class, ['updated_at' => Carbon::now()->subYear(5)]);
        $active_user = create(\App\User::class, ['updated_at' => Carbon::now()]);
        $this->artisan('delete:unactiveusers');
        $this->assertTrue($unactive_user1->fresh()->trashed());
        $this->assertTrue($unactive_user2->fresh()->trashed());
        $this->assertFalse($active_user->fresh()->trashed());
    }

    /** @test */
    public function check_report_unactive_user(): void
    {
        $unactive_user1 = create(\App\User::class, ['updated_at' => Carbon::now()->subYear(6)]);
        $unactive_user2 = create(\App\User::class, ['updated_at' => Carbon::now()->subYear(5)]);
        $active_user = create(\App\User::class, ['updated_at' => Carbon::now()]);
        $number_unactive_user = UserHelper::deleteInactiveUsers(5);
        $this->assertEquals(2, $number_unactive_user);
    }

    public function mail_to_be_sent()
    {
        $unactive_user1 = create(\App\User::class, ['updated_at' => Carbon::now()->subYear(6)]);
        $this->artisan('delete:unactiveusers');
        Mail::assertQueued(DeletedUsers::class, 1);
    }
}
