<?php

namespace App\Listeners;

use Illuminate\Queue\Events\QueueBusy;
use Illuminate\Support\Facades\Log;

class AlertOnBusyQueue
{
    /**
     * Report a queue that has more jobs waiting than we consider healthy.
     *
     * Registered by event auto-discovery via the typed parameter below. Laravel
     * only fires this event while `queue:monitor` is running, so it is useless
     * without the scheduled entry in routes/console.php.
     */
    public function handle(QueueBusy $event): void
    {
        $message = sprintf(
            'Queue [%s] on connection [%s] has %d pending jobs.',
            $event->queue,
            $event->connection,
            $event->size
        );

        Log::error($message);

        \Sentry\captureMessage($message);
    }
}
