<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;

class LogSentMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(object $event): void
    {
        Log::channel('mails_sent')->info(
            $event->message->getSubject().
                ' => '.
                array_key_first($event->message->getTo()) ??
                'ERR'
        );
    }
}
