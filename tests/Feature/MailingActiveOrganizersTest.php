<?php

namespace Tests\Feature;

use App\Helpers\ReminderHelper;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MailingActiveOrganizersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_select_only_active_organizers(): void
    {
        $active = \App\User::factory()->create(['email' => 'active@gmail.com', 'magic_key' => 131313]);
        $active2 = \App\User::factory()->create(['email' => 'active2@gmail.com', 'magic_key' => 252525]);
        $inactive = \App\User::factory()->create(['email' => 'inactive@gmail.com']);
        $inactive2 = \App\User::factory()->create(['email' => 'inactive2@gmail.com', 'receive_emails' => false]);
        $deleted = \App\User::factory()->create(['email' => 'deleted@gmail.com', 'deleted_at' => now()]);

        \App\Event::factory()->count(5)->
        create(
            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now(),
                'creator_id' => $active->id,
            ]
        );

        \App\Event::factory()->count(2)->
        create(

            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now(),
                'creator_id' => $active2->id,
            ],

        );

        \App\Event::factory()->count(7)->
        create(

            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now()->subYear(),
                'creator_id' => $active->id,
            ],
        );

        \App\Event::factory()->count(4)->
        create(

            [
                'status' => 'REJECTED',
                'creator_id' => $inactive->id,
            ]
        );

        \App\Event::factory()->count(8)->
        create(

            [
                'status' => 'APPROVED',
                'creator_id' => $inactive2->id,
            ],
        );

        \App\Event::factory()->count(2)->
        create(

            [
                'status' => 'APPROVED',
                'creator_id' => $deleted->id,
            ],
        );

        $active = ReminderHelper::getActiveCreators();

        $this->assertEqualsCanonicalizing(
            [
                (object) ['email' => 'active2@gmail.com', 'magic_key' => 252525],
                (object) ['email' => 'active@gmail.com', 'magic_key' => 131313],
            ],
            $active->toArray()
        );
    }
}
