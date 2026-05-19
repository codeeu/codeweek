<?php

namespace App\Console\Commands\Support;

use App\Services\Support\Gmail\GmailOAuthConfig;
use App\Services\Support\Gmail\SupportGmailPollQuery;
use App\Services\Support\SupportSenderAllowlist;
use Google\Client as GoogleClient;
use Google\Service\Gmail as GmailService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class GmailSetupCheckCommand extends Command
{
    protected $signature = 'support:gmail:setup-check';

    protected $description = 'Verify Support Gmail copilot configuration (credentials, DB, allowlist, dry-run).';

    public function handle(SupportSenderAllowlist $allowlist): int
    {
        $checks = [];

        $checks['enabled'] = (bool) config('support_gmail.enabled');
        $checks['dry_run'] = (bool) config('support_gmail.dry_run', true);
        $checks['notify_email'] = (string) config('support_gmail.notify_email');
        $checks['allowed_domains'] = $allowlist->allowedDomains();
        $checks['allowed_emails'] = $allowlist->allowedEmails();
        $checks['label'] = config('support_gmail.label');
        $checks['subject_prefix'] = config('support_gmail.subject_prefix');
        $checks['effective_poll_query'] = SupportGmailPollQuery::resolve();

        $checks['tables'] = [
            'support_cases' => Schema::hasTable('support_cases'),
            'support_approvals' => Schema::hasTable('support_approvals'),
            'support_gmail_cursors' => Schema::hasTable('support_gmail_cursors'),
        ];

        $checks['approval_gmail_columns'] = Schema::hasTable('support_approvals')
            && Schema::hasColumn('support_approvals', 'gmail_thread_id');

        try {
            $client = new GoogleClient();
            $client->setApplicationName('Codeweek Internal Support Copilot');
            $client->setScopes([
                GmailService::GMAIL_READONLY,
                GmailService::GMAIL_SEND,
            ]);
            $client->setAccessType('offline');
            GmailOAuthConfig::applyClientSecrets($client);
            GmailOAuthConfig::applyAccessToken($client);
            $checks['oauth'] = [
                'credentials_ok' => true,
                'token_present' => !empty($client->getAccessToken()),
                'token_expired' => $client->isAccessTokenExpired(),
            ];
        } catch (\Throwable $e) {
            $checks['oauth'] = [
                'credentials_ok' => false,
                'error' => $e->getMessage(),
            ];
        }

        try {
            Cache::lock('support:gmail:setup-check', 5)->get();
            $checks['redis_lock'] = true;
        } catch (\Throwable $e) {
            $checks['redis_lock'] = false;
            $checks['redis_lock_error'] = $e->getMessage();
        }

        $ok = $checks['enabled']
            && ($checks['tables']['support_cases'] ?? false)
            && ($checks['tables']['support_gmail_cursors'] ?? false)
            && ($checks['oauth']['credentials_ok'] ?? false)
            && ($checks['oauth']['token_present'] ?? false);

        $this->line(json_encode([
            'ok' => $ok,
            'tool' => 'support:gmail:setup-check',
            'checks' => $checks,
            'next_steps' => $ok ? [] : [
                'Set SUPPORT_GMAIL_ENABLED=true',
                'Run migrations for support_* tables',
                'Set SUPPORT_GMAIL_CREDENTIALS + SUPPORT_GMAIL_TOKEN (or file paths)',
                'Re-run support:gmail:authorize if token missing or missing gmail.send scope',
            ],
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return $ok ? self::SUCCESS : self::FAILURE;
    }
}
