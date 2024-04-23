<?php

namespace App\Console\Commands\mailing;

use App\Helpers\MailingHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class GermanMailing extends Command
{
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
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $recipients = MailingHelper::getActiveCreators('DE');

        //$recipients = ['alainvd@gmail.com'];

        $this->info(count($recipients));

        foreach ($recipients as $user) {
            Mail::to($user->email)->queue(new \App\Mail\GermanMailing());
        }

        $this->info('Mailing Sent');
    }
}
