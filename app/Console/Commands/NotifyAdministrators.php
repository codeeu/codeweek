<?php

namespace App\Console\Commands;

use App\Notification;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyAdministrators extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:administrators';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify Administrators in case of new activities to be promoted to online calendar';

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
     * @return int
     */
    public function handle()
    {

        //Get Number of activities that need to be featured
        $notifications_to_be_sent = Notification::whereNull('sent_at');

        if ($notifications_to_be_sent->count() > 0){
            //Get the admins
            $admins = User::role('super admin')->get();


            //Queue an email for each of them
            foreach ($admins as $admin){
                Mail::to($admin->email)->queue(new \App\Mail\NotifyAdministrator($notifications_to_be_sent->count()));
            }

            //Update the notifications
            foreach ($notifications_to_be_sent->get() as $notification){
                $notification->sent_at = Carbon::now();
                $notification->save();
            }
        }




    }
}
