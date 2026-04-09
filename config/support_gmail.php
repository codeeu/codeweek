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
];

