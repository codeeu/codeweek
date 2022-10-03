<?php

namespace App\Console\Commands\mailing;

use App\Helpers\MailingHelper;
use App\Helpers\ReminderHelper;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class GermanMailing extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailing:german';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mail German Organizers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $recipients = MailingHelper::getActiveCreators('DE');


        //$recipients = ['alainvd@gmail.com'];

        $this->info(sizeof($recipients));

        foreach ($recipients as $user) {
            Mail::to($user->email)->queue(new \App\Mail\GermanMailing());
        }

        $this->info('Mailing Sent');
    }
}
