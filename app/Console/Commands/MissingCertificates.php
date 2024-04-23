<?php

namespace App\Console\Commands;

use App\Event;
use App\Helpers\EventHelper;
use App\Jobs\MissingCertificate;
use Illuminate\Console\Command;

class MissingCertificates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'missing:certificates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Missing Certificates';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // get all the events with faulty certificate status

        $faultyCertificatesEvents = EventHelper::getReportedEventsWithoutCertificates();

        //$faultyCertificatesEvents = Event::where('id',171675)->get();

        $this->info('Faulty Certificates Found: '.$faultyCertificatesEvents->count());

        // Create the Job to
        // - generate certificate
        // - send email
        foreach ($faultyCertificatesEvents as $event) {
            MissingCertificate::dispatch($event);
        }

        return Command::SUCCESS;
    }
}
