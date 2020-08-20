<?php

namespace App\Console\Commands;

use App\Helpers\ReminderHelper;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class RemindCreators extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:creators';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind Creators to report their events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info("Sending email to remind event creators");

        //Get email from creators having at least one event that has less than 3 reminders sent
        $creators = ReminderHelper::getCreatorsWithReportableEvents();
        Log::info(count($creators) . " emails should be sent");
        //Send one email per creator.
        $mailsQueued=0;
        foreach ($creators as $creator) {
            $user = User::find($creator->creator_id);
            //Skip deleted users && users that do not wish to receive emails
            if ($user && $user->receive_emails){
                Mail::to($user->email)->queue(new \App\Mail\RemindCreator($user));
                $mailsQueued++;
            }

        }
        Log::info($mailsQueued . " emails have been queued");

        $events = ReminderHelper::getReportableEvents();
        $eventsCount = count($events->get());
        Log::info($eventsCount . " events will be updated");
        $updated = $events
            ->update([
                'report_notifications_count' => DB::raw('report_notifications_count+1'),
                'last_report_notification_sent_at' => Carbon::now()
            ]);
        Log::info($updated . " events have been updated with success.");

        Mail::to(env('ADMIN_EMAIL'))->queue(new \App\Mail\RemindersSummary(count($creators), $eventsCount, $updated, $mailsQueued));


    }
}
