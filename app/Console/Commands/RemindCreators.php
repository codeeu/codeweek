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
        Log::info(count($creators) . " emails will be sent");
        //Send one email per creator.
        foreach ($creators as $creator) {
            $user = User::find($creator->creator_id);
            Mail::to($user->email)->queue(new \App\Mail\RemindCreator($user));
        }
        Log::info(count($creators) . " emails have been queued");

        $events = ReminderHelper::getReportableEvents();
        Log::info(count($events->get()) . " events will be updated");
        $updated = $events
            ->update([
                'report_notifications_count' => DB::raw('report_notifications_count+1'),
                'last_report_notification_sent_at' => Carbon::now()
            ]);
        Log::info($updated . " events have been updated with success.");


    }
}
