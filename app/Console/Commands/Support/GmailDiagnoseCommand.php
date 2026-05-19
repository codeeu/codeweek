<?php

namespace App\Console\Commands\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\Gmail\GmailConnector;
use App\Services\Support\Gmail\SupportGmailPollQuery;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GmailDiagnoseCommand extends Command
{
    protected $signature = 'support:gmail:diagnose';

    protected $description = 'Debug why support Gmail tickets are not processing (poll query, recent cases, failed jobs).';

    public function handle(GmailConnector $connector): int
    {
        $this->line(json_encode([
            'enabled' => (bool) config('support_gmail.enabled'),
            'dry_run' => (bool) config('support_gmail.dry_run', true),
            'notify_email' => config('support_gmail.notify_email'),
            'subject_prefix' => config('support_gmail.subject_prefix'),
            'label' => config('support_gmail.label'),
            'effective_poll_query' => SupportGmailPollQuery::resolve(),
            'queue_connection' => config('queue.default'),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        if (!config('support_gmail.enabled')) {
            $this->warn('SUPPORT_GMAIL_ENABLED is false.');

            return self::FAILURE;
        }

        try {
            $result = $connector->fetchNewMessages(
                mailbox: (string) config('support_gmail.user', 'me'),
                label: config('support_gmail.label'),
                query: SupportGmailPollQuery::resolve(),
                sinceHistoryId: null,
                max: 5,
            );

            $preview = [];
            foreach ($result['messages'] as $msg) {
                $preview[] = [
                    'id' => $msg->id,
                    'subject' => $msg->subject,
                    'from' => $msg->from,
                ];
            }

            $this->line(json_encode([
                'gmail_matches' => count($preview),
                'warnings' => $result['warnings'] ?? [],
                'messages' => $preview,
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        } catch (\Throwable $e) {
            $this->error('Gmail API error: '.$e->getMessage());

            return self::FAILURE;
        }

        $cases = SupportCase::query()->orderByDesc('id')->limit(5)->get([
            'id', 'subject', 'status', 'source_channel', 'created_at', 'forwarded_by_email',
        ]);

        $this->line(json_encode([
            'recent_support_cases' => $cases->toArray(),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        if (DB::getSchemaBuilder()->hasTable('failed_jobs')) {
            $failed = DB::table('failed_jobs')
                ->where('payload', 'like', '%ProcessSupportCase%')
                ->orderByDesc('id')
                ->limit(3)
                ->get(['id', 'failed_at']);

            $this->line(json_encode([
                'failed_support_jobs' => $failed->toArray(),
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }

        return self::SUCCESS;
    }
}
