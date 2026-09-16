<?php

namespace Tests\Feature;

use Illuminate\Queue\Events\QueueBusy;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class BusyQueueAlertTest extends TestCase
{
    #[Test]
    public function a_busy_queue_is_logged_as_an_error(): void
    {
        Log::shouldReceive('error')
            ->once()
            ->with('Queue [default] on connection [redis] has 250 pending jobs.');

        event(new QueueBusy('redis', 'default', 250));
    }
}
