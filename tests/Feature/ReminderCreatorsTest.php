<?php

namespace Tests\Feature;

use App\Event;
use App\Helpers\ReminderHelper;
use App\Mail\RemindCreator;
use App\Mail\RemindersSummary;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReminderCreatorsTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function only_get_creators_with_reportable_events()
    {
        Mail::fake();

        $userA = create('App\User');
        $userB = create('App\User');
        $userD = create('App\User');


        //Setup world


        $userC = create('App\User', ['email' => ""]);
        $userE = create('App\User');
        $userF = create('App\User');

        $alreadyReported = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 3, 'end_date' => Carbon::now()->subDay(1), 'reported_at' => Carbon::now()]);
        $maxNotifications = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 3, 'end_date' => Carbon::now()->subDay(1)]);
        $notFinished = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->addDay(1)]);
        $lastYear = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subYear(1)]);
        $pendingEvent = create('App\Event', ['status' => 'PENDING', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)]);
        $noemail = create('App\Event', ['creator_id' => $userC->id, 'status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)]);
        $notifiedLately = create('App\Event', ['creator_id' => $userE->id, 'status' => 'APPROVED', 'last_report_notification_sent_at' => Carbon::now()->subDay(1), 'end_date' => Carbon::now()->subDay(1)]);
        $today = create('App\Event', ['creator_id' => $userF->id, 'status' => 'APPROVED', 'last_report_notification_sent_at' => Carbon::now(), 'end_date' => Carbon::now()->subDay(1)]);

        $reportableevents = create('App\Event', ['creator_id' => $userA->id, 'status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)], 3);
        $reportableevents2 = create('App\Event', ['creator_id' => $userB->id, 'status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)], 3);
        $notifiedMoreThanAWeek = create('App\Event', ['creator_id' => $userD->id, 'status' => 'APPROVED', 'last_report_notification_sent_at' => Carbon::now()->subDays(8), 'end_date' => Carbon::now()->subDay(1)]);


        $this->assertCount(3, ReminderHelper::getCreatorsWithReportableEvents());

        $this->assertEquals($userA->email, ReminderHelper::getCreatorsWithReportableEvents()[0]->email);
        $this->assertEquals($userB->email, ReminderHelper::getCreatorsWithReportableEvents()[1]->email);
        $this->assertEquals($userD->email, ReminderHelper::getCreatorsWithReportableEvents()[2]->email);


        $this->artisan('remind:creators');

        Mail::assertQueued(RemindCreator::class, 3);

        $this->artisan('remind:creators');

        Mail::assertQueued(RemindCreator::class, 3);
    }

    /** @test */
    public function mail_should_be_sent()
    {
        $this->withExceptionHandling();

        Mail::fake();

        $reportableevent = create('App\Event', ['status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);

        $this->artisan('remind:creators');

        Mail::assertQueued(RemindCreator::class);

    }

    /** @test */
    public function only_one_mail_should_be_sent()
    {
        $this->withExceptionHandling();

        Mail::fake();

        $userA = create('App\User');

        $reportableevent = create('App\Event', ['creator_id' => $userA->id, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)], 2);

        $this->artisan('remind:creators');
        $this->artisan('remind:creators');
        $this->artisan('remind:creators');
        $this->artisan('remind:creators');
        $this->artisan('remind:creators');
        $this->artisan('remind:creators');
        $this->artisan('remind:creators');

        Mail::assertQueued(RemindCreator::class, 1);

    }

    /** @test */
    public function should_get_the_reportable_events_list()
    {
        $this->withExceptionHandling();

        Mail::fake();

        $userA = create('App\User');

        $reportableevent = create('App\Event', ['creator_id' => $userA->id, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)], 20);

        $this->assertEquals(20,ReminderHelper::getReportableEvents()->count());

    }

    /** @test */
    public function no_mail_should_be_sent()
    {
        $this->withExceptionHandling();

        Mail::fake();

        $invalidEvent = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subYear(1)]);

        $this->artisan('remind:creators');

        Mail::assertNotQueued(RemindCreator::class);

    }

    /** @test */
    public function notification_reports_should_increase()
    {

        Mail::fake();

        $this->withExceptionHandling();

        $reportableevent0 = create('App\Event', ['report_notifications_count' => 0, 'creator_id' => 1, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);
        $reportableevent1 = create('App\Event', ['report_notifications_count' => 1, 'creator_id' => 1, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);
        $reportableevent2 = create('App\Event', ['report_notifications_count' => 2, 'creator_id' => 1, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);
        $reportableevent3 = create('App\Event', ['report_notifications_count' => 3, 'creator_id' => 1, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);

        $this->artisan('remind:creators');

        $this->assertEquals(1, $reportableevent0->fresh()->report_notifications_count);
        $this->assertEquals(2, $reportableevent1->fresh()->report_notifications_count);
        $this->assertEquals(3, $reportableevent2->fresh()->report_notifications_count);
        $this->assertEquals(3, $reportableevent3->fresh()->report_notifications_count);

    }


    /** @test */
    public function notification_reports_should_increase_up_to_3_times()
    {
        $this->withExceptionHandling();

        Mail::fake();

        $reportableevent = create('App\Event', ['last_report_notification_sent_at' => Carbon::now()->subDays(8), 'report_notifications_count' => 3, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);

        $this->artisan('remind:creators');

        $this->assertEquals(3, Event::first()->report_notifications_count);


    }

    /** @test */
    public function notification_date_should_be_updated()
    {

        $this->withExceptionHandling();

        Mail::fake();

        $reportableevent = create('App\Event', ['last_report_notification_sent_at' => Carbon::now()->subDays(8), 'report_notifications_count' => 0, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);

        $this->artisan('remind:creators');

        $this->assertEquals(Carbon::now()->dayOfYear, Carbon::parse(Event::first()->last_report_notification_sent_at)->dayOfYear);

    }

    /** @test */
    public function deleted_users_should_not_receive_emails()
    {

        Mail::fake();
        $this->withExceptionHandling();

        //Create a 'deleted' user
        $userDeleted = create('App\User', ['deleted_at' => Carbon::now()->subDay()]);

        //Create event with a user
        $reportableevent = create('App\Event', ['last_report_notification_sent_at' => Carbon::now()->subDays(8), 'report_notifications_count' => 0, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1), 'creator_id' => $userDeleted->id]);

        //no mails should have been sent
        $this->artisan('remind:creators');



    }

    /** @test */
    public function opted_out_users_should_not_receive_emails()
    {

        Mail::fake();
        $this->withExceptionHandling();

        //Create a 'deleted' user
        $userOptedout = create('App\User', ['receive_emails' => 0]);

        //Create event with a user
        $reportableevent = create('App\Event', ['report_notifications_count' => 0, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1), 'creator_id' => $userOptedout->id]);

        //no mails should have been sent
        $this->artisan('remind:creators');

        Mail::assertQueued(RemindersSummary::class);
        Mail::assertNotQueued(RemindCreator::class);

    }

    protected function createNonReportableEvents(): void
    {
        $userC = create('App\User', ['email' => ""]);
        $userE = create('App\User');

        $alreadyReported = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 3, 'end_date' => Carbon::now()->subDay(1), 'reported_at' => Carbon::now()]);
        $maxNotifications = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 3, 'end_date' => Carbon::now()->subDay(1)]);
        $notFinished = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->addDay(1)]);
        $lastYear = create('App\Event', ['status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subYear(1)]);
        $pendingEvent = create('App\Event', ['status' => 'PENDING', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)]);
        $noemail = create('App\Event', ['creator_id' => $userC->id, 'status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)]);
        $notifiedLately = create('App\Event', ['creator_id' => $userE->id, 'status' => 'APPROVED', 'last_report_notification_sent_at' => Carbon::now()->subDay(1), 'end_date' => Carbon::now()->subDay(1)]);
    }
}
