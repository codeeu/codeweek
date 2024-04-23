<?php

namespace App\Console\Commands;

use App\Helpers\ReminderHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailingInactiveOrganizers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailing:inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mail Inactive Organizers from previous years';

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
     */
    public function handle(): int
    {
        $recipients = ReminderHelper::getInactiveCreators(2021);
        //$recipients = ['alainvd@gmail.com'];

        $this->info(count($recipients));

        foreach ($recipients as $email) {
            Mail::to($email)->queue(new \App\Mail\MailingInactive());
        }
    }
}
