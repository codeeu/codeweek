<?php

namespace App\Console\Commands\Support;

use App\Services\Support\Gmail\GmailIngestService;
use Illuminate\Console\Command;

class GmailPollCommand extends Command
{
    protected $signature = 'support:gmail:poll {--max=25 : Max messages to fetch}';

    protected $description = 'Poll Gmail for new support emails and ingest them as support cases.';

    public function handle(GmailIngestService $ingest): int
    {
        $max = (int) $this->option('max');
        $result = $ingest->pollAndIngest($max);

        $this->line(json_encode([
            'ok' => true,
            'tool' => 'support:gmail:poll',
            'result' => $result,
        ], JSON_PRETTY_PRINT));

        return self::SUCCESS;
    }
}

