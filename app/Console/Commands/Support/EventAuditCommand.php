<?php

namespace App\Console\Commands\Support;

use App\Services\Support\EventAuditService;
use App\Services\Support\SupportJson;
use Illuminate\Console\Command;

class EventAuditCommand extends Command
{
    protected $signature = 'support:event-audit {identifier} {--json}';

    protected $description = 'Support tool: audit events for a user context';

    public function handle(EventAuditService $service): int
    {
        $identifier = (string) $this->argument('identifier');
        $input = ['identifier' => $identifier];

        try {
            $payload = $service->audit($identifier);
        } catch (\Throwable $e) {
            $payload = SupportJson::fail('event_audit', $input, $e->getMessage());
        }

        $this->output->writeln(json_encode($payload, JSON_UNESCAPED_SLASHES));

        return $payload['ok'] ? self::SUCCESS : self::FAILURE;
    }
}

