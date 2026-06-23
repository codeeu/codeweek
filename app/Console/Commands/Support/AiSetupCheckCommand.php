<?php

namespace App\Console\Commands\Support;

use App\Services\Support\Cursor\CursorAgentService;
use App\Services\Support\Cursor\GitHubPullRequestService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class AiSetupCheckCommand extends Command
{
    protected $signature = 'support:ai:setup-check';

    protected $description = 'Verify Support AI copilot config (Cursor key, CLI binary, models, DB columns, GitHub token).';

    public function handle(CursorAgentService $cursorAgent, GitHubPullRequestService $github): int
    {
        $checks = [];
        $warnings = [];

        $checks['ai_enabled'] = (bool) config('support_ai.enabled');
        $checks['triage_enabled'] = (bool) config('support_ai.triage.enabled');
        $checks['code_change_enabled'] = (bool) config('support_ai.code_change.enabled');
        $checks['gmail_dry_run'] = (bool) config('support_gmail.dry_run', true);

        $apiKey = trim((string) config('support_ai.cursor_api_key', ''));
        $checks['cursor_api_key_present'] = $apiKey !== '';
        if ($apiKey === '') {
            $warnings[] = 'CURSOR_API_KEY is empty — set it in .env then run config:clear.';
        }

        // CLI binary
        $cliBin = (string) config('support_ai.triage.cli_bin', 'agent');
        $resolved = $this->resolveBinary($cliBin);
        $checks['cli_bin_config'] = $cliBin;
        $checks['cli_bin_resolved'] = $resolved;
        $checks['cli_bin_executable'] = $resolved !== null && is_executable($resolved);
        if (!$checks['cli_bin_executable']) {
            $warnings[] = "Cursor CLI not found/executable at '{$cliBin}'. Set SUPPORT_AI_CLI_BIN to the absolute path (e.g. /home/forge/.local/bin/agent).";
        }

        $checks['triage_model'] = (string) config('support_ai.triage.model');
        $checks['cloud_model'] = (string) config('support_ai.code_change.model');

        // Cloud API key validity + model availability (cheap GET; no token cost).
        if ($apiKey !== '') {
            $models = $cursorAgent->listModels();
            $checks['cloud_api_reachable'] = (bool) ($models['ok'] ?? false);
            if ($models['ok'] ?? false) {
                $ids = (array) ($models['result']['models'] ?? []);
                $checks['cloud_model_available'] = in_array($checks['cloud_model'], $ids, true);
                if (!$checks['cloud_model_available']) {
                    $warnings[] = "Cloud model '{$checks['cloud_model']}' not in /v1/models — pick a valid id for SUPPORT_AI_CLOUD_MODEL.";
                }
            } else {
                $warnings[] = 'Could not reach Cursor /v1/models with the key: '.implode(';', (array) ($models['errors'] ?? []));
            }
        }

        // DB columns from the Phase 1 migration.
        $checks['db_columns'] = [
            'cursor_agent_id' => Schema::hasColumn('support_cases', 'cursor_agent_id'),
            'cursor_agent_status' => Schema::hasColumn('support_cases', 'cursor_agent_status'),
            'cursor_pr_url' => Schema::hasColumn('support_cases', 'cursor_pr_url'),
            'live_promotion_pr_url' => Schema::hasColumn('support_cases', 'live_promotion_pr_url'),
        ];
        if (in_array(false, $checks['db_columns'], true)) {
            $warnings[] = 'Missing support_cases columns — run: php artisan migrate.';
        }

        $checks['code_change_in_allowed_actions'] = in_array('code_change', (array) config('support_gmail.allowed_write_actions', []), true);

        // Dev -> Live promotion.
        $checks['live_promotion'] = (string) config('support_ai.live_promotion', 'pr_only');
        $checks['live_branch'] = (string) config('support_ai.live_branch', 'master');
        $checks['dev_branch'] = (string) config('support_ai.code_change.dev_branch', 'dev');
        $checks['github_token_present'] = trim((string) config('support_ai.github_token', '')) !== '';
        $checks['github_promotion_ready'] = $github->enabled() && $checks['live_promotion'] === 'pr_only';
        if ($checks['live_promotion'] === 'pr_only' && !$checks['github_token_present']) {
            $warnings[] = 'SUPPORT_GITHUB_TOKEN empty — dev→live release PR will be skipped until set.';
        }

        $ok = $checks['cursor_api_key_present']
            && $checks['cli_bin_executable']
            && !in_array(false, $checks['db_columns'], true)
            && $checks['code_change_in_allowed_actions'];

        $this->line(json_encode([
            'ok' => $ok,
            'tool' => 'support:ai:setup-check',
            'checks' => $checks,
            'warnings' => $warnings,
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return $ok ? self::SUCCESS : self::FAILURE;
    }

    private function resolveBinary(string $bin): ?string
    {
        if (str_contains($bin, '/')) {
            return is_file($bin) ? $bin : null;
        }

        $path = trim((string) shell_exec('command -v '.escapeshellarg($bin).' 2>/dev/null'));

        return $path !== '' ? $path : null;
    }
}
