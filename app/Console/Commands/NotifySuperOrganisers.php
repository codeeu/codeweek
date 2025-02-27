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
        $this->info("🔹 NotifySuperOrganisers command started for edition: $edition");

        // Fetch winners for the given edition
        $winners = Excellence::byYear($edition, 'SuperOrganiser');

        if ($winners->isEmpty()) {
            $this->warn("⚠️ No winners found for edition: $edition");
            Log::info("No SuperOrganiser winners found for edition: $edition.");
            return;
        }

        $notifiedCount = 0;

        foreach ($winners as $winner) {
            $user = $winner->user;

            if (! $user) {
                $this->warn("⚠️ Skipping winner with missing user data (ID: $winner->id)");
                Log::warning("Skipping winner with missing user data. Winner ID: $winner->id");
                continue;
            }

            if ($user->email && $user->receive_emails) {
                // Send email notification
                Mail::to($user->email)->queue(new \App\Mail\NotifySuperOrganiser($user, $edition));

                // Mark as notified
                $excellence = $user->superOrganisers->where('edition', '=', $edition)->first();
                if ($excellence) {
                    $excellence->notified_at = Carbon::now();
                    $excellence->save();
                }

                $notifiedCount++;
                $this->info("✅ Email queued for: {$user->email}");
                Log::info("Email queued for SuperOrganiser: {$user->email}, Edition: $edition");
            } else {
                $this->warn("⚠️ Skipping user {$user->id} (No valid email or opted out)");
                Log::info("User {$user->id} skipped - No valid email or opted out.");
            }
        }

        $this->info("✅ NotifySuperOrganisers command executed for edition: $edition, Emails sent: $notifiedCount");
        Log::info("NotifySuperOrganisers command completed. Edition: $edition, Emails sent: $notifiedCount.");
    }
}
