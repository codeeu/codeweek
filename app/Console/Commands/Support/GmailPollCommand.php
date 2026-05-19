<?php

namespace App\Console\Commands\Support;

use App\Services\Support\Gmail\GmailIngestService;
use App\Services\Support\Gmail\SupportGmailPollQuery;
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
            'dry_run_mode' => (bool) config('support_gmail.dry_run', true),
            'effective_poll_query' => SupportGmailPollQuery::resolve(),
            'result' => $result,
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return self::SUCCESS;
    }
}

