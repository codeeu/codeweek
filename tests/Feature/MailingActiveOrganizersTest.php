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
        $active = create(\App\User::class, ['email' => 'active@gmail.com', 'magic_key' => 131313]);
        $active2 = create(\App\User::class, ['email' => 'active2@gmail.com', 'magic_key' => 252525]);
        $inactive = create(\App\User::class, ['email' => 'inactive@gmail.com']);
        $inactive2 = create(\App\User::class, ['email' => 'inactive2@gmail.com', 'receive_emails' => false]);
        $deleted = create(\App\User::class, ['email' => 'deleted@gmail.com', 'deleted_at' => now()]);

        create(
            \App\Event::class,
            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now(),
                'creator_id' => $active->id,
            ],
            5
        );

        create(
            \App\Event::class,
            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now(),
                'creator_id' => $active2->id,
            ],
            2
        );

        create(
            \App\Event::class,
            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now()->subYear(),
                'creator_id' => $active->id,
            ],
            7
        );

        create(
            \App\Event::class,
            [
                'status' => 'REJECTED',
                'creator_id' => $inactive->id,
            ],
            4
        );

        create(
            \App\Event::class,
            [
                'status' => 'APPROVED',
                'creator_id' => $inactive2->id,
            ],
            8
        );

        create(
            \App\Event::class,
            [
                'status' => 'APPROVED',
                'creator_id' => $deleted->id,
            ],
            2
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
