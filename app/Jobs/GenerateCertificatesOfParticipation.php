<?php

namespace App\Jobs;

use App\Helpers\CertificatesHelper;
use App\Participation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateCertificatesOfParticipation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Participation $participation;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 300;

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
     */
    public function handle(): void
    {
        $names = array_map('trim', explode(',', $this->participation->names));

        $this->participation['status'] = 'PROCESSING';
        $this->participation->save();

        $zipUrl = CertificatesHelper::doGenerateCertificatesOfParticipation($names, $this->participation->event_name, $this->participation->event_date);

        $this->participation['participation_url'] = $zipUrl;
        if ($zipUrl) {
            $this->participation['status'] = 'DONE';
        } else {
            $this->participation['status'] = 'FAILED';
        }
        $this->participation->save();
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        $this->participation['status'] = 'FAILED';
        $this->participation->save();
    }
}
