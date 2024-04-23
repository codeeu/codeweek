<?php

namespace App\Console\Commands;

use App\Jobs\GenerateCertificatesOfParticipation;
use App\Participation;
use Illuminate\Console\Command;

class CertificatesOfParticipation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'certificate:participation {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $id = $this->argument('id');
        $participation = Participation::firstWhere('id', $id);

        //Dispatch Job
        GenerateCertificatesOfParticipation::dispatchSync($participation);

        $this->info('Job dispatched');

        return Command::SUCCESS;
    }
}
