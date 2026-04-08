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

    // Google service account or OAuth client credentials JSON path.
    'credentials_json' => env('SUPPORT_GMAIL_CREDENTIALS_JSON', null),

    // Token JSON path for OAuth installed-app flows (if used).
    'token_json' => env('SUPPORT_GMAIL_TOKEN_JSON', null),

    // When true, mark ingested messages as read and/or apply a label.
    'post_process' => [
        'mark_as_read' => env('SUPPORT_GMAIL_MARK_AS_READ', false),
        'apply_label' => env('SUPPORT_GMAIL_APPLY_LABEL', null),
    ],
];

