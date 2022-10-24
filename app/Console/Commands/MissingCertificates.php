<?php

namespace App\Console\Commands;

use App\Event;
use App\Helpers\EventHelper;
use App\Jobs\MissingCertificate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

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
        //TODO: uncomment
        //$faultyCertificatesEvents = EventHelper::getReportedEventsWithoutCertificates();

        $faultyCertificatesEvents = Event::where('id',394021)->get();

        $this->info("Faulty Certificated Found: " . $faultyCertificatesEvents->count());

        // Create the Job to
        // - generate certificate
        // - send email
        foreach ($faultyCertificatesEvents as $event) {
            MissingCertificate::dispatch($event);
        }

        return Command::SUCCESS;
    }
}
