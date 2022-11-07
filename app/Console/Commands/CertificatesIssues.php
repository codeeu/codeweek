<?php

namespace App\Console\Commands;

use App\Participation;
use Carbon\Carbon;
use Illuminate\Console\Command;
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
     *
     * @return int
     */
    public function handle()
    {

        $issues = Participation::whereNull('participation_url')->where('created_at','<', Carbon::now()->subMinutes(10))->get();

        if(count($issues) > 0){
            //Send warning Email
            $admin = config('codeweek.administrator');
            Mail::to($admin)->queue(new \App\Mail\WarningEmail("We have ". count($issues). " certificates of participation that have not been generated"));
        }

        return Command::SUCCESS;
    }
}
