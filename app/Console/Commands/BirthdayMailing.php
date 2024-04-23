<?php

namespace App\Console\Commands;

use App\Helpers\ReminderHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class BirthdayMailing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Birthday Mailing';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $recipients = ReminderHelper::getActiveCreators();

        $this->info(count($recipients));

        foreach ($recipients as $user) {
            Mail::to($user->email)->queue(new \App\Mail\BirthdayMailing($user->email, $user->magic_key));
        }
    }
}
