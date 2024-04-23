<?php

namespace App\Console\Commands\mailing;

use App\Helpers\MailingHelper;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class PolishMailing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailing:poland';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mail Polish Organizers';

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
        $recipients = MailingHelper::getActiveCreators('PL');

        //$recipients = ['alainvd@gmail.com'];
        //        $recipients = User::where("id","19588")->get();

        $this->info(count($recipients));

        foreach ($recipients as $user) {
            Mail::to($user->email)->queue(new \App\Mail\PolishMailing($user->email, $user->magic_key));
        }

        $this->info('Mailing Sent');
    }
}
