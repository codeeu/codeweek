<?php

namespace App\Console\Commands\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\SupportJson;
use App\Services\Support\UserRestoreService;
use Illuminate\Console\Command;

class UserRestoreCommand extends Command
{
    protected $signature = 'support:user-restore {email} {--dry-run} {--json}';

    protected $description = 'Support tool: restore a soft-deleted user (dry-run supported)';

    public function handle(UserRestoreService $service): int
    {
        $email = (string) $this->argument('email');
        $dryRun = (bool) $this->option('dry-run');

        // CLI usage is not tied to a support case; create a lightweight ephemeral one for audit trail if desired later.
        $case = SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'CLI: support:user-restore',
            'raw_message' => 'CLI invocation',
            'normalized_message' => null,
            'status' => 'investigating',
            'risk_level' => 'medium',
            'correlation_id' => SupportJson::correlationId(),
        ]);

        $payload = $service->restore($case, $email, $dryRun);

        $this->output->writeln(json_encode($payload, JSON_UNESCAPED_SLASHES));

        return $payload['ok'] ? self::SUCCESS : self::FAILURE;
    }
}

