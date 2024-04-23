<?php

namespace App\Console\Commands\mailing;

use App\Helpers\MailingHelper;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ItalianMailing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailing:italian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mail Italian Organizers';

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
        $recipients = MailingHelper::getActiveCreators('IT');

        //        $recipients = User::where("id","19588")->get();

        $this->info(count($recipients));

        foreach ($recipients as $user) {
            Mail::to($user->email)->queue(new \App\Mail\ItalianMailing($user->email, $user->magic_key));
        }

        $this->info('Mailing Sent');
    }
}
