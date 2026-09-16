<?php

return [
    'administrator' => env('ADMIN_EMAIL', 'admin@codeweek.test'),
    'app_url' => env('APP_URL', 'http://codeweek.test'),
    'resources_url' => env('RESOURCES_URL', 'http://codeweek.test/resources'),
    'pdflatex_path' => env('PDFLATEX_PATH', ''),
    'db_connection' => env('DB_CONNECTION', ''),
    'aws_url' => env('AWS_URL', ''),
    'relocation_country' => env('RELOCATION_COUNTRY', ''),
    'MAPS_MAPBOX_ACCESS_TOKEN' => env('MAPS_MAPBOX_ACCESS_TOKEN', ''),
    'MAP_TILES' => env('MAP_TILES', ''),
    'EEDUCATION_CLIENTID' => env('EEDUCATION_CLIENTID', null),
    'LOCALES' => env('LOCALES', null),
    'blog_url' => env('BLOG_URL', 'https://codeweek.eu/blog'),

    // Cloudflare Turnstile. Deployed environments set TURNSTILE_SECRET, while the
    // code used to read TURNSTILE_SECRET_KEY, which silently disabled verification.
    // Both names are accepted so neither spelling can turn the CAPTCHA off.
    'turnstile_sitekey' => env('TURNSTILE_SITEKEY', env('TURNSTILE_SITE_KEY')),
    'turnstile_secret' => env('TURNSTILE_SECRET_KEY', env('TURNSTILE_SECRET')),

    'contact_form_recipient' => env(
        'CONTACT_FORM_RECIPIENT_EMAIL',
        env('ADMIN_EMAIL', 'admin@codeweek.test')
    ),

    // Pending-job count above which queue:monitor fires QueueBusy. Raise it if
    // October traffic makes the alert noisy rather than switching the alert off.
    'queue_busy_threshold' => (int) env('QUEUE_BUSY_THRESHOLD', 100),

    // Who may use /admin/certificate-backend/*. Comma-separated list of email
    // addresses; no role grants access. This used to be a single hardcoded
    // address in the middleware, which locked out everyone else.
    'certificate_admin_emails' => array_values(array_filter(array_map(
        'trim',
        explode(',', (string) env('CERTIFICATE_ADMIN_EMAILS', ''))
    ))),
];
