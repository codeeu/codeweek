<?php

namespace App\Console\Commands;

use App\Excellence;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotifyWinners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:winners {edition}';

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
    public function handle()
    {

        $edition = $this->argument('edition');

        $winners = Excellence::byYear($edition);

        foreach ($winners as $winner) {

            $user = $winner->user;

            if ($user->email){
                Mail::to($user->email)->queue(new \App\Mail\NotifyWinner($user, $edition));
            } else {
                Log::info($user->id . " has no valid email address");
            }

        }
    }
}
