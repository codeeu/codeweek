<?php

namespace App\Jobs;

use App\Event;
use App\Helpers\GeolocationHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class RelocateEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $event;

    protected $coords;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info($this->event->id.' being updated');
        $this->coords = GeolocationHelper::getCoordinates(
            $this->event->location
        );
        $this->event->relocateWithCoordinates($this->coords);
    }
}
