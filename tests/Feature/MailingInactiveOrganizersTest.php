<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Helpers\ReminderHelper;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

final class MailingInactiveOrganizersTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function it_should_select_only_inactive_organizers(): void
    {
        $active = \App\User::factory()->create(['email' => 'active@gmail.com']);
        $active2 = \App\User::factory()->create(['email' => 'active2@gmail.com']);
        $inactive = \App\User::factory()->create(['email' => 'inactive@gmail.com']);
        $inactive2 = \App\User::factory()->create(['email' => 'inactive2@gmail.com']);

        \App\Event::factory()->count(5)->
        create(

            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now(),
                'creator_id' => $active->id,
            ],
        );

        \App\Event::factory()->count(2)->
        create(

            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now(),
                'creator_id' => $active2->id,
            ]

        );

        \App\Event::factory()->count(7)->
        create(

            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now()->subYear(),
                'creator_id' => $active->id,
            ]
        );

        \App\Event::factory()->count(4)->
        create(

            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now()->subYear(),
                'creator_id' => $inactive->id,
            ],
        );

        \App\Event::factory()->count(8)->
        create(

            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now()->subYears(2),
                'creator_id' => $inactive2->id,
            ],
        );

        $inactive = ReminderHelper::getInactiveCreators(Carbon::now()->year);

        $this->assertEqualsCanonicalizing(
            ['inactive@gmail.com'],
            $inactive->toArray()
        );
    }
}
