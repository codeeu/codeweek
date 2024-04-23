<?php

namespace App\Console\Commands;

use App\Excellence;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotifySuperOrganisers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:superorganisers {edition}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify winners of Codeweek4all excellence for specified edition';

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
    public function handle(): void
    {

        $edition = $this->argument('edition');

        $winners = Excellence::byYear($edition, 'SuperOrganiser');

        foreach ($winners as $winner) {

            $user = $winner->user;

            if (! $user) {
                continue;
            }

            if ($user->email && $user->receive_emails) {
                Mail::to($user->email)->queue(new \App\Mail\NotifySuperOrganiser($user, $edition));
                $excellence = $user->superOrganisers->where('edition', '=', $edition)->first();

                $excellence->notified_at = Carbon::now();
                $excellence->save();

            } else {
                Log::info($user->id.' has no valid email address');
            }

        }
    }
}
