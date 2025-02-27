<?php

namespace App\Console\Commands;

use App\Excellence;
use Carbon\Carbon;
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
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $edition = $this->argument('edition');

        $this->info("🔹 NotifyWinners command started for edition: {$edition}");

        // Get all Excellence rows for this edition that have notified_at=null
        $winners = Excellence::byYear($edition);

        if ($winners->isEmpty()) {
            $this->warn("⚠️ No winners found for edition: {$edition}");
            return;
        }

        $count = 0;
        foreach ($winners as $winner) {
            $user = $winner->user;

            // If no user is associated, we remove this row
            if (is_null($user)) {
                $this->warn("User is null for winner ID {$winner->id}. Deleting row.");
                $winner->delete();
                continue;
            }

            // If user has a valid email and is set to receive emails
            if ($user->email && $user->receive_emails === 1) {
                Mail::to($user->email)->queue(new \App\Mail\NotifyWinner($user, $edition));

                // Mark notified
                $winner->notified_at = Carbon::now();
                $winner->save();

                $count++;
                $this->info("✅ Queued email for: {$user->email}");
            } else {
                // user->email is null or user->receive_emails=0
                Log::info("User {$user->id} has no valid email or doesn't receive emails");
                $this->warn("User {$user->id} not notified (invalid email or receive_emails=0)");
            }
        }

        $this->info("✅ NotifyWinners command finished for edition {$edition}. Emails sent: {$count}");
    }
}
