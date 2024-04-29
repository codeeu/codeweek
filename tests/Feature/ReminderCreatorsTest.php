<?php

namespace Tests\Feature;

use App\Event;
use App\Helpers\ReminderHelper;
use App\Mail\RemindCreator;
use App\Mail\RemindersSummary;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class ReminderCreatorsTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function only_get_creators_with_reportable_events(): void
    {
        Mail::fake();

        $userA = \App\User::factory()->create();
        $userB = \App\User::factory()->create();
        $userD = \App\User::factory()->create();

        //Setup world

        $userC = \App\User::factory()->create(['email' => '']);
        $userE = \App\User::factory()->create();
        $userF = \App\User::factory()->create();

        $alreadyReported = \App\Event::factory()->create(['status' => 'APPROVED', 'report_notifications_count' => 3, 'end_date' => Carbon::now()->subDay(1), 'reported_at' => Carbon::now()]);
        $maxNotifications = \App\Event::factory()->create(['status' => 'APPROVED', 'report_notifications_count' => 3, 'end_date' => Carbon::now()->subDay(1)]);
        $notFinished = \App\Event::factory()->create(['status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->addDay(1)]);
        $lastYear = \App\Event::factory()->create(['status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subYear(1)]);
        $pendingEvent = \App\Event::factory()->create(['status' => 'PENDING', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)]);
        $noemail = \App\Event::factory()->create(['creator_id' => $userC->id, 'status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)]);
        $notifiedLately = \App\Event::factory()->create(['creator_id' => $userE->id, 'status' => 'APPROVED', 'last_report_notification_sent_at' => Carbon::now()->subDay(1), 'end_date' => Carbon::now()->subDay(1)]);
        $today = \App\Event::factory()->create(['creator_id' => $userF->id, 'status' => 'APPROVED', 'last_report_notification_sent_at' => Carbon::now(), 'end_date' => Carbon::now()->subDay(1)]);

        $reportableevents = \App\Event::factory()->count(3)->create(['creator_id' => $userA->id, 'status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)]);
        $reportableevents2 = \App\Event::factory()->count(3)->create(['creator_id' => $userB->id, 'status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)]);
        $notifiedMoreThanAWeek = \App\Event::factory()->create(['creator_id' => $userD->id, 'status' => 'APPROVED', 'last_report_notification_sent_at' => Carbon::now()->subDays(8), 'end_date' => Carbon::now()->subDay(1)]);

        $this->assertCount(3, ReminderHelper::getCreatorsWithReportableEvents());

        $this->assertEquals($userA->email, ReminderHelper::getCreatorsWithReportableEvents()[0]->email);
        $this->assertEquals($userB->email, ReminderHelper::getCreatorsWithReportableEvents()[1]->email);
        $this->assertEquals($userD->email, ReminderHelper::getCreatorsWithReportableEvents()[2]->email);

        $this->artisan('remind:creators');

        Mail::assertQueued(RemindCreator::class, 3);

        $this->artisan('remind:creators');

        Mail::assertQueued(RemindCreator::class, 3);
    }

    #[Test]
    public function mail_should_be_sent(): void
    {
        $this->withExceptionHandling();

        Mail::fake();

        $reportableevent = \App\Event::factory()->create(['status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);

        $this->artisan('remind:creators');

        Mail::assertQueued(RemindCreator::class);

    }

    #[Test]
    public function only_one_mail_should_be_sent(): void
    {
        $this->withExceptionHandling();

        Mail::fake();

        $userA = \App\User::factory()->create();

        $reportableevent = \App\Event::factory()->count(2)->create(['creator_id' => $userA->id, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);

        $this->artisan('remind:creators');
        $this->artisan('remind:creators');
        $this->artisan('remind:creators');
        $this->artisan('remind:creators');
        $this->artisan('remind:creators');
        $this->artisan('remind:creators');
        $this->artisan('remind:creators');

        Mail::assertQueued(RemindCreator::class, 1);

    }

    #[Test]
    public function should_get_the_reportable_events_list(): void
    {
        $this->withExceptionHandling();

        Mail::fake();

        $userA = \App\User::factory()->create();

        $reportableevent = \App\Event::factory()->count(20)->create(['creator_id' => $userA->id, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);

        $this->assertEquals(20, ReminderHelper::getReportableEvents()->count());

    }

    #[Test]
    public function no_mail_should_be_sent(): void
    {
        $this->withExceptionHandling();

        Mail::fake();

        $invalidEvent = \App\Event::factory()->create(['status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subYear(1)]);

        $this->artisan('remind:creators');

        Mail::assertNotQueued(RemindCreator::class);

    }

    #[Test]
    public function notification_reports_should_increase(): void
    {

        Mail::fake();

        $this->withExceptionHandling();

        $reportableevent0 = \App\Event::factory()->create(['report_notifications_count' => 0, 'creator_id' => 1, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);
        $reportableevent1 = \App\Event::factory()->create(['report_notifications_count' => 1, 'creator_id' => 1, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);
        $reportableevent2 = \App\Event::factory()->create(['report_notifications_count' => 2, 'creator_id' => 1, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);
        $reportableevent3 = \App\Event::factory()->create(['report_notifications_count' => 3, 'creator_id' => 1, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);

        $this->artisan('remind:creators');

        $this->assertEquals(1, $reportableevent0->fresh()->report_notifications_count);
        $this->assertEquals(2, $reportableevent1->fresh()->report_notifications_count);
        $this->assertEquals(3, $reportableevent2->fresh()->report_notifications_count);
        $this->assertEquals(3, $reportableevent3->fresh()->report_notifications_count);

    }

    #[Test]
    public function notification_reports_should_increase_up_to_3_times(): void
    {
        $this->withExceptionHandling();

        Mail::fake();

        $reportableevent = \App\Event::factory()->create(['last_report_notification_sent_at' => Carbon::now()->subDays(8), 'report_notifications_count' => 3, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);

        $this->artisan('remind:creators');

        $this->assertEquals(3, Event::first()->report_notifications_count);

    }

    #[Test]
    public function notification_date_should_be_updated(): void
    {

        $this->withExceptionHandling();

        Mail::fake();

        $reportableevent = \App\Event::factory()->create(['last_report_notification_sent_at' => Carbon::now()->subDays(8), 'report_notifications_count' => 0, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1)]);

        $this->artisan('remind:creators');

        $this->assertEquals(Carbon::now()->dayOfYear, Carbon::parse(Event::first()->last_report_notification_sent_at)->dayOfYear);

    }

    #[Test]
    public function deleted_users_should_not_receive_emails(): void
    {

        Mail::fake();
        $this->withExceptionHandling();

        //Create a 'deleted' user
        $userDeleted = \App\User::factory()->create(['deleted_at' => Carbon::now()->subDay()]);

        //Create event with a user
        $reportableevent = \App\Event::factory()->create(['last_report_notification_sent_at' => Carbon::now()->subDays(8), 'report_notifications_count' => 0, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1), 'creator_id' => $userDeleted->id]);

        //no mails should have been sent
        $this->artisan('remind:creators');

        Mail::assertNotQueued(RemindCreator::class);

    }

    #[Test]
    public function opted_out_users_should_not_receive_emails(): void
    {

        Mail::fake();
        $this->withExceptionHandling();

        //Create a 'deleted' user
        $userOptedout = \App\User::factory()->create(['receive_emails' => 0]);

        //Create event with a user
        $reportableevent = \App\Event::factory()->create(['report_notifications_count' => 0, 'status' => 'APPROVED', 'end_date' => Carbon::now()->subDay(1), 'creator_id' => $userOptedout->id]);

        //no mails should have been sent
        $this->artisan('remind:creators');

        Mail::assertQueued(RemindersSummary::class);
        Mail::assertNotQueued(RemindCreator::class);

    }

    protected function createNonReportableEvents(): void
    {
        $userC = \App\User::factory()->create(['email' => '']);
        $userE = \App\User::factory()->create();

        $alreadyReported = \App\Event::factory()->create(['status' => 'APPROVED', 'report_notifications_count' => 3, 'end_date' => Carbon::now()->subDay(1), 'reported_at' => Carbon::now()]);
        $maxNotifications = \App\Event::factory()->create(['status' => 'APPROVED', 'report_notifications_count' => 3, 'end_date' => Carbon::now()->subDay(1)]);
        $notFinished = \App\Event::factory()->create(['status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->addDay(1)]);
        $lastYear = \App\Event::factory()->create(['status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subYear(1)]);
        $pendingEvent = \App\Event::factory()->create(['status' => 'PENDING', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)]);
        $noemail = \App\Event::factory()->create(['creator_id' => $userC->id, 'status' => 'APPROVED', 'report_notifications_count' => 2, 'end_date' => Carbon::now()->subDay(1)]);
        $notifiedLately = \App\Event::factory()->create(['creator_id' => $userE->id, 'status' => 'APPROVED', 'last_report_notification_sent_at' => Carbon::now()->subDay(1), 'end_date' => Carbon::now()->subDay(1)]);
    }
}
