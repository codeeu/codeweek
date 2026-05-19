<?php

return [
    'enabled' => env('SUPPORT_GMAIL_ENABLED', false),

    // In a load-balanced setup, use a distributed lock so only one node polls at a time.
    'lock' => [
        'name' => env('SUPPORT_GMAIL_LOCK_NAME', 'support:gmail:poll'),
        'ttl_seconds' => env('SUPPORT_GMAIL_LOCK_TTL_SECONDS', 120),
    ],

    // Mailbox user to query, usually "me" or a specific inbox user.
    'user' => env('SUPPORT_GMAIL_USER', 'me'),

    // Optional label to scope ingestion (e.g. "Support-AI").
    'label' => env('SUPPORT_GMAIL_LABEL', null),

    // Optional query string appended to Gmail search.
    // Example: 'is:unread newer_than:7d -category:promotions'
    'query' => env('SUPPORT_GMAIL_QUERY', 'newer_than:7d'),

    // Google OAuth client JSON: paste full JSON from Google Cloud (preferred on Forge; survives deploys).
    'credentials' => env('SUPPORT_GMAIL_CREDENTIALS'),

    // Alternative: path to the same JSON on disk (e.g. storage/app/google/support-gmail-credentials.json).
    'credentials_json' => env('SUPPORT_GMAIL_CREDENTIALS_JSON', null),

    // OAuth token JSON: paste token from support:gmail:authorize (preferred on Forge).
    'token' => env('SUPPORT_GMAIL_TOKEN'),

    // Alternative: path to token JSON (e.g. storage/app/google/support-gmail-token.json).
    'token_json' => env('SUPPORT_GMAIL_TOKEN_JSON', null),

    // When true, mark ingested messages as read and/or apply a label.
    'post_process' => [
        'mark_as_read' => env('SUPPORT_GMAIL_MARK_AS_READ', false),
        'apply_label' => env('SUPPORT_GMAIL_APPLY_LABEL', null),
    ],

    // Safe mode: pipeline runs read-only checks; writes require email APPROVE reply.
    'dry_run' => env('SUPPORT_GMAIL_DRY_RUN', true),

    // Only ingest / approve from these domains (subdomains allowed).
    'allowed_sender_domains' => array_values(array_filter(array_map(
        'trim',
        explode(',', (string) env('SUPPORT_GMAIL_ALLOWED_DOMAINS', 'matrixinternet.ie,codeweek.eu')),
    ))),

    // Optional explicit sender allowlist (in addition to domains).
    'allowed_sender_emails' => array_values(array_filter(array_map(
        'trim',
        explode(',', (string) env('SUPPORT_GMAIL_ALLOWED_SENDERS', '')),
    ))),

    // Default recipient for support:gmail:test and dry-run summaries when requester unknown.
    'notify_email' => env('SUPPORT_GMAIL_NOTIFY_EMAIL', 'codeweek@matrixinternet.ie'),

    // First line of a reply must match one of these (case-insensitive) to approve.
    'approval_keywords' => ['approve', 'yes', 'proceed'],

    // Subject prefix for approval threads: "[CW-SUPPORT #123] ..."
    'approval_subject_prefix' => '[CW-SUPPORT',
];

