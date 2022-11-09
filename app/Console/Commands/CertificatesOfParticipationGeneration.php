<?php

namespace App\Console\Commands;

use App\Jobs\GenerateCertificatesOfParticipation;
use App\Participation;
use Illuminate\Console\Command;

class CertificatesOfParticipationGeneration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'certificates:fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate missing certificates of participation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $participations = Participation::whereNull('participation_url')->where('status','<>','ERROR')->get();

        $this->info(count($participations) . ' certificates of participation to generate');

//        dd(count($participations));
        //Dispatch Job
        foreach ($participations as $participation){
            GenerateCertificatesOfParticipation::dispatchSync($participation);
        }

        $this->info('Fixed');

        return Command::SUCCESS;
    }
}
