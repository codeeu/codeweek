<?php

namespace Tests\Feature;

use App\Helpers\ReminderHelper;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MailingInactiveOrganizersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_select_only_inactive_organizers(): void
    {
        $active = create(\App\User::class, ['email' => 'active@gmail.com']);
        $active2 = create(\App\User::class, ['email' => 'active2@gmail.com']);
        $inactive = create(\App\User::class, ['email' => 'inactive@gmail.com']);
        $inactive2 = create(\App\User::class, ['email' => 'inactive2@gmail.com']);

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
                'status' => 'APPROVED',
                'end_date' => Carbon::now()->subYear(),
                'creator_id' => $inactive->id,
            ],
            4
        );

        create(
            \App\Event::class,
            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now()->subYears(2),
                'creator_id' => $inactive2->id,
            ],
            8
        );

        $inactive = ReminderHelper::getInactiveCreators(Carbon::now()->year);

        $this->assertEqualsCanonicalizing(
            ['inactive@gmail.com'],
            $inactive->toArray()
        );
    }
}
