<?php

namespace App\Console\Commands\Support;

use App\Services\Support\EventParticipationCodeService;
use App\Services\Support\SupportJson;
use Illuminate\Console\Command;

class EventParticipationCodeUpdateCommand extends Command
{
    protected $signature = 'support:event-participation-code-update
                            {old_code : Current Code Week 4 All participation code}
                            {new_code : Replacement participation code}
                            {--year= : Only events created in this year (required)}
                            {--month= : Only events created in this month (1-12)}
                            {--dry-run : Preview affected events without updating}
                            {--json}';

    protected $description = 'Support tool: change Code Week 4 All participation code on scoped events';

    public function handle(EventParticipationCodeService $service): int
    {
        $oldCode = (string) $this->argument('old_code');
        $newCode = (string) $this->argument('new_code');
        $yearOption = $this->option('year');
        $monthOption = $this->option('month');
        $dryRun = (bool) $this->option('dry-run');

        if ($yearOption === null || trim((string) $yearOption) === '') {
            $payload = SupportJson::fail('event_participation_code_update', [
                'old_code' => $oldCode,
                'new_code' => $newCode,
            ], 'missing_year_scope');
            $this->output->writeln(json_encode($payload, JSON_UNESCAPED_SLASHES));

            return self::FAILURE;
        }

        $year = (int) $yearOption;
        $month = ($monthOption !== null && trim((string) $monthOption) !== '')
            ? (int) $monthOption
            : null;

        $payload = $service->update($oldCode, $newCode, $year, $month, $dryRun);
        $this->output->writeln(json_encode($payload, JSON_UNESCAPED_SLASHES));

        return ($payload['ok'] ?? false) ? self::SUCCESS : self::FAILURE;
    }
}
