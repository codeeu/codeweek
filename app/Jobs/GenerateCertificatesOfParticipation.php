<?php

namespace App\Jobs;

use App\Certificate;
use App\Helpers\CertificatesHelper;
use App\Participation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateCertificatesOfParticipation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Participation $participation;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Participation $participation)
    {
        $this->participation = $participation;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $names = array_map('trim', explode(',', $this->participation->names));

        $zipUrl = CertificatesHelper::doGenerateCertificatesOfParticipation($names, $this->participation->event_name, $this->participation->event_date);

        $this->participation["participation_url"] = $zipUrl;
        $this->participation["status"] = "DONE";

        $this->participation->save();
    }
}
