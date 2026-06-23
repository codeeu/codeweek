<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Support AI copilot (Phase 1: AI triage + frontend code PRs)
    |--------------------------------------------------------------------------
    | Master switch. When false, the bot keeps using the deterministic
    | heuristic triage and does NOT touch the Cursor APIs.
    */
    'enabled' => env('SUPPORT_AI_ENABLED', false),

    // Single Cursor key powers both the headless CLI (triage brain) and the
    // Cloud Agents API (code changes + PRs). Service-account key recommended.
    'cursor_api_key' => env('CURSOR_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Triage brain — Cursor headless CLI (agent -p --output-format json)
    |--------------------------------------------------------------------------
    */
    'triage' => [
        'enabled' => env('SUPPORT_AI_TRIAGE_ENABLED', true),
        // Path to the Cursor CLI binary on the server (installed via cursor.com/install).
        'cli_bin' => env('SUPPORT_AI_CLI_BIN', 'agent'),
        'model' => env('SUPPORT_AI_CLI_MODEL', 'gpt-5.4-mini-medium'),
        'timeout_seconds' => (int) env('SUPPORT_AI_CLI_TIMEOUT', 120),
    ],

    /*
    |--------------------------------------------------------------------------
    | Frontend code changes — Cursor Cloud Agents API
    |--------------------------------------------------------------------------
    | A cloud agent makes the change on a cursor/... branch and opens a PR into
    | the dev branch. Requires the GitHub repo connected to Cursor.
    */
    'code_change' => [
        'enabled' => env('SUPPORT_AI_CODE_CHANGE_ENABLED', false),
        'api_base' => env('SUPPORT_AI_CURSOR_API_BASE', 'https://api.cursor.com'),
        'model' => env('SUPPORT_AI_CLOUD_MODEL', 'composer-2.5'),
        'repo_url' => env('SUPPORT_AI_REPO_URL', 'https://github.com/codeeu/codeweek'),
        'dev_branch' => env('SUPPORT_AI_DEV_BRANCH', 'dev'),
        'auto_create_pr' => filter_var(env('SUPPORT_AI_AUTO_CREATE_PR', true), FILTER_VALIDATE_BOOL),
        'request_timeout_seconds' => (int) env('SUPPORT_AI_CLOUD_TIMEOUT', 30),
        'max_poll_minutes' => (int) env('SUPPORT_AI_MAX_POLL_MINUTES', 30),
    ],

    /*
    |--------------------------------------------------------------------------
    | Dev -> Live promotion
    |--------------------------------------------------------------------------
    | 'pr_only' : after a fix lands in dev, open a dev -> live PR for a human
    |             to merge (Forge auto-deploys live). Never auto-merges.
    | 'none'    : never touch live; only ever PR into dev.
    */
    'live_promotion' => env('SUPPORT_AI_LIVE_PROMOTION', 'pr_only'),
    'live_branch' => env('SUPPORT_AI_LIVE_BRANCH', 'master'),

    // GitHub REST access for opening the dev -> live promotion PR (token-gated;
    // promotion is skipped gracefully if absent). owner/repo form.
    'github_repo' => env('SUPPORT_GITHUB_REPO', 'codeeu/codeweek'),
    'github_token' => env('SUPPORT_GITHUB_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Phase 2 — AI-driven artisan changes on the server
    |--------------------------------------------------------------------------
    | Allowlist-first: the AI may only pick an allowlisted command (see
    | App\Services\Support\Artisan\ArtisanActionRegistry). If none fits and
    | allow_raw_fallback is true, it may propose a raw artisan command — still
    | dry-run + emailed APPROVE, and still subject to the destructive deny-list.
    */
    'artisan' => [
        'enabled' => env('SUPPORT_AI_ARTISAN_ENABLED', false),
        'allow_raw_fallback' => filter_var(env('SUPPORT_AI_ARTISAN_ALLOW_RAW', true), FILTER_VALIDATE_BOOL),
        'timeout_seconds' => (int) env('SUPPORT_AI_ARTISAN_TIMEOUT', 120),
        'output_limit' => (int) env('SUPPORT_AI_ARTISAN_OUTPUT_LIMIT', 8000),
        'php_binary' => env('SUPPORT_AI_PHP_BINARY', PHP_BINARY),

        // Subcommand verbs that are NEVER allowed, even via raw fallback.
        'denylist' => [
            'migrate:fresh', 'migrate:reset', 'migrate:rollback', 'migrate:refresh',
            'db:wipe', 'db:seed', 'tinker', 'down', 'env', 'key:generate',
            'config:cache', 'route:cache', 'optimize',
        ],
    ],
];
