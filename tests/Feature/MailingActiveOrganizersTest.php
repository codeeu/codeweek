<?php

namespace Tests\Feature;

use App\Event;
use App\Helpers\ReminderHelper;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailingActiveOrganizersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_select_only_active_organizers()
    {
        $active = create('App\User', ['email' => 'active@gmail.com']);
        $active2 = create('App\User', ['email' => 'active2@gmail.com']);
        $inactive = create('App\User', ['email' => 'inactive@gmail.com']);
        $inactive2 = create('App\User', ['email' => 'inactive2@gmail.com', 'receive_emails' => false]);
        $deleted = create('App\User', ['email' => 'deleted@gmail.com', 'deleted_at' => now()]);

        create(
            'App\Event',
            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now(),
                'creator_id' => $active->id
            ],
            5
        );

        create(
            'App\Event',
            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now(),
                'creator_id' => $active2->id
            ],
            2
        );

        create(
            'App\Event',
            [
                'status' => 'APPROVED',
                'end_date' => Carbon::now()->subYear(),
                'creator_id' => $active->id
            ],
            7
        );

        create(
            'App\Event',
            [
                'status' => 'REJECTED',
                'creator_id' => $inactive->id
            ],
            4
        );

        create(
            'App\Event',
            [
                'status' => 'APPROVED',
                'creator_id' => $inactive2->id
            ],
            8
        );

        create(
            'App\Event',
            [
                'status' => 'APPROVED',
                'creator_id' => $deleted->id
            ],
            2
        );

        $active = ReminderHelper::getActiveCreators();

        $this->assertEqualsCanonicalizing(
            ['active@gmail.com', 'active2@gmail.com'],
            $active->toArray()
        );
    }
}
