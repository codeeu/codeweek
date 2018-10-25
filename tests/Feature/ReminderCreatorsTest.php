<?php

namespace Tests\Feature;

use App\Helpers\ReminderHelper;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemindCreatorsTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function only_get_creators_with_reportable_events()
    {
        $userA = create('App\User');
        $userB = create('App\User');
        $userC = create('App\User',['email'=>""]);

        //Setup world
        $alreadyReported = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 3, 'end_date' => Carbon::now()->subDay(1), 'reported_at' => Carbon::now()]);
        $maxNotifications = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 3, 'end_date' => Carbon::now()->subDay(1)]);
        $notFinished = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->addDay(1)]);
        $lastYear = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subYear(1)]);
        $pendingEvent = create('App\Event', ['status' => 'PENDING', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)]);
        $noemail = create('App\Event', ['creator_id'=>$userC->id,'status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)]);
        $reportableevents = create('App\Event', ['creator_id'=>$userA->id,'status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)],3);
        $reportableevents2 = create('App\Event', ['creator_id'=>$userB->id,'status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)],3);

        $this->assertCount(2,ReminderHelper::getCreatorsWithReportableEvents());

        $this->assertEquals($userA->email, ReminderHelper::getCreatorsWithReportableEvents()[0]->email);
        $this->assertEquals($userB->email, ReminderHelper::getCreatorsWithReportableEvents()[1]->email);




    }
}
