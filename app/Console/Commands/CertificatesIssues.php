<?php

namespace App\Console\Commands;

use App\Participation;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CertificatesIssues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'certificate:issues';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for certificates with issues being generated';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {

        $issues = Participation::whereNull('participation_url')
            ->where('status', 'PENDING')
            ->where('created_at', '<', Carbon::now()->subMinutes(5))->get();

        Log::info('certificate with issues: '.count($issues));

        if (count($issues) > 0) {
            //Send warning Email
            $admin = config('codeweek.administrator');
            Mail::to($admin)->queue(new \App\Mail\WarningEmail('We have '.count($issues).' certificates of participation that have not been generated'));
            Log::info('mail queued to '.$admin);
        }

        return Command::SUCCESS;
    }
}
