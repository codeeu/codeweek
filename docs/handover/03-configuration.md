# 03 — Configuration

Every variable below is documented by **name and purpose**. No values appear in this folder. Real values live in the server `.env` (managed through Forge) and in the credentials vault.

## Before you trust `.env.example`

[.env.example](../../.env.example) is **significantly incomplete**. It reflects a minimal test configuration, not a working deployment. Roughly forty variables that production depends on are absent from it, including the entire mail configuration, all OAuth secrets, the Mapbox token, the resources bucket, the `pdflatex` path, and the database host and credentials.

The practical consequence: **copying `.env.example` will not give you a working application.** Use the server `.env` from Forge as your reference when setting up a new environment.

The file used to ship a real base64 `APP_KEY` along with live S3 bucket names. Those are now blank, and the variables the application actually reads are listed by name with empty values. Still: **always run `php artisan key:generate`** for a new environment, and treat the key that was previously committed as compromised anywhere it was used.

### Variables present in the deployed environment but missing from `.env.example`

Add these when reconstructing an environment:

```
AZURE_CLIENT_ID, AZURE_CLIENT_SECRET, AZURE_REDIRECT
CACHE_DRIVER
CONTACT_FORM_RECIPIENT_EMAIL
DB_HOST, DB_PORT, DB_USERNAME, DB_PASSWORD
FACEBOOK_CLIENT_SECRET
GITHUB_CLIENT_ID, GITHUB_CLIENT_SECRET, GITHUB_REDIRECT
GOOGLE_CLIENT_ID, GOOGLE_CLIENT_SECRET, GOOGLE_REDIRECT
MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD,
MAIL_ENCRYPTION, MAIL_FROM_ADDRESS, MAIL_FROM_NAME
MAPS_MAPBOX_ACCESS_TOKEN
PDFLATEX_PATH
QUEUE_CONNECTION
RELOCATION_COUNTRY
RESOURCES_BUCKET, RESOURCES_URL
SANCTUM_STATEFUL_DOMAINS
SESSION_LIFETIME, SESSION_SECURE_COOKIE
TURNSTILE_SECRET, TURNSTILE_SITEKEY
TWITTER_CLIENT_ID, TWITTER_CLIENT_SECRET, TWITTER_REDIRECT
VITE_DEV_SERVER_URL, VITE_RESOURCES_URL
```

## Laravel 11 variable renames

The Laravel 11 upgrade renamed two variables. Both old and new names are present in the deployed environment, which is harmless but confusing:

| Old name | Current name |
|----------|--------------|
| `QUEUE_DRIVER` | `QUEUE_CONNECTION` |
| `CACHE_DRIVER` | `CACHE_STORE` |

`.env.example` used to list only `QUEUE_DRIVER`, which the framework ignores — a value set under the old name has **no effect** and queues fall back to the default. It now uses `QUEUE_CONNECTION`. Check the server `.env` for the same mistake. Also added during that upgrade: `AUTH_MODEL` (must be `App\User`, because the User model is not in `app/Models/`), `MAIL_ENCRYPTION`, and `CACHE_PREFIX`.

## Variables by concern

### Application core

| Variable | Purpose |
|----------|---------|
| `APP_ENV` | Environment name — `local`, `production` |
| `APP_KEY` | Encryption key. Generate per environment, never share |
| `APP_DEBUG` | Debug mode. Must be false on live |
| `APP_TIMEZONE` | Application timezone (UTC) |
| `APP_URL` | Canonical site URL. Used for links, Nova, and the `codeweek.app_url` config |
| `VITE_APP_URL` | Base URL exposed to the front-end build |
| `VITE_DEV_SERVER_URL` | Vite hot-reload server during development |
| `APP_LOCALE`, `APP_FALLBACK_LOCALE`, `APP_FAKER_LOCALE` | Laravel locale defaults |
| `APP_MAINTENANCE_DRIVER`, `APP_MAINTENANCE_STORE` | Maintenance mode storage |
| `AUTH_MODEL` | The User model class. Must be `App\User` |
| `LOCALES` | Comma-separated list of site locales. Drives the language switcher |
| `ADMIN_EMAIL` | Recipient for system warnings and admin notifications |
| `BLOG_URL` | Base URL of the WordPress blog, used by the sync command |
| `SANCTUM_STATEFUL_DOMAINS` | Domains allowed to use session-based API auth |
| `BCRYPT_ROUNDS` | Password hashing cost |

### Database

| Variable | Purpose |
|----------|---------|
| `DB_CONNECTION` | Driver. `mysql` in all real environments, `sqlite` for tests |
| `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` | MySQL connection |
| `DB_DATABASE_TESTING` | Separate database name for the `mysql_testing` connection |
| `MYSQL_ATTR_SSL_CA` | Path to a CA bundle if the database requires TLS |

### Cache, session, queue, Redis

| Variable | Purpose |
|----------|---------|
| `CACHE_STORE` | Cache driver |
| `SESSION_DRIVER` | Session storage backend |
| `SESSION_ENCRYPT`, `SESSION_PATH`, `SESSION_DOMAIN` | Session cookie scope |
| `SESSION_LIFETIME`, `SESSION_SECURE_COOKIE` | Session expiry and HTTPS-only flag |
| `QUEUE_CONNECTION` | Queue driver. **Must not be `sync` on live** — see note below |
| `REDIS_HOST`, `REDIS_PORT`, `REDIS_PASSWORD` | Redis connection, via the `predis` client |

A `sync` queue connection means every queued job runs inline during the web request. For certificate batches and bulk imports that will time out the request. Confirm the live value is a real queue driver.

### Mail

| Variable | Purpose |
|----------|---------|
| `MAIL_MAILER` | Transport — `smtp` or `mailgun` |
| `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_ENCRYPTION` | SMTP connection |
| `MAIL_FROM_ADDRESS`, `MAIL_FROM_NAME` | Default From header |
| `MAIL_URL`, `MAIL_EHLO_DOMAIN` | Advanced SMTP options |
| `MAILGUN_DOMAIN`, `MAILGUN_SECRET`, `MAILGUN_ENDPOINT` | Mailgun API transport |
| `CONTACT_FORM_RECIPIENT_EMAIL` | Where the public contact form delivers |

The default SMTP host in `config/mail.php` is Mailgun's. Almost all mail in the application is sent with `Mail::queue()`, so **mail depends on a running queue worker**.

`CONTACT_FORM_RECIPIENT_EMAIL` has a hardcoded fallback to an outgoing-team address in `app/Http/Controllers/ContactFormController.php`. Set it explicitly or contact form submissions will keep going to the wrong place.

### AWS and file storage

| Variable | Purpose |
|----------|---------|
| `AWS_ACCESS_KEY_ID`, `AWS_SECRET_ACCESS_KEY` | Credentials, shared by both S3 disks |
| `AWS_DEFAULT_REGION` | Region |
| `AWS_BUCKET` | Main bucket — activity images, avatars, certificate PDFs |
| `AWS_URL` | Public base URL for the main bucket |
| `AWS_ENDPOINT`, `AWS_USE_PATH_STYLE_ENDPOINT` | For S3-compatible alternatives |
| `FILESYSTEM_CLOUD` | Default cloud disk name |
| `RESOURCES_BUCKET` | Separate bucket for Learn & Teach PDFs and thumbnails |
| `RESOURCES_URL` | Public base URL for the resources bucket |
| `VITE_RESOURCES_URL` | The resources URL exposed to the front end |
| `RESOURCES_IMPORT_TEMP_DISK` | Temporary disk for resource imports. Defaults to `local` |
| `BULK_UPLOAD_TEMP_DISK` | Temporary disk for bulk uploads. Defaults to `local` |

Disks are defined in [config/filesystems.php](../../config/filesystems.php):

| Disk | Driver | Location | Holds |
|------|--------|----------|-------|
| `latex` | local | `resources/latex/` | Certificate templates and intermediate TeX artefacts |
| `excel` | local | `resources/excel/` | Source spreadsheets for the legacy CLI importers |
| `meet-and-code` | local | `public/rss/` | Generated Meet and Code RSS |
| `s3` | S3 | `AWS_BUCKET` | Activity images, avatars, certificate PDFs at `certificates/{id}.pdf` |
| `resources` | S3 | `RESOURCES_BUCKET` | Learn & Teach resource PDFs and thumbnails |

### OAuth and social login

Configured in [config/services.php](../../config/services.php), consumed by `app/Http/Controllers/Auth/LoginController.php`.

| Provider | Variables | Wired into login? |
|----------|-----------|-------------------|
| Google | `GOOGLE_CLIENT_ID`, `GOOGLE_CLIENT_SECRET`, `GOOGLE_REDIRECT` | Yes |
| Facebook | `FACEBOOK_CLIENT_ID`, `FACEBOOK_CLIENT_SECRET`, `FACEBOOK_REDIRECT` | Yes |
| X / Twitter | `TWITTER_CLIENT_ID`, `TWITTER_CLIENT_SECRET`, `TWITTER_REDIRECT` | Yes |
| GitHub | `GITHUB_CLIENT_ID`, `GITHUB_CLIENT_SECRET`, `GITHUB_REDIRECT` | Yes |
| Azure | `AZURE_CLIENT_ID`, `AZURE_CLIENT_SECRET`, `AZURE_REDIRECT` | **No** |

The allowlist is hardcoded in the controller:

```70:70:app/Http/Controllers/Auth/LoginController.php
        $allowed_providers = ['twitter', 'github', 'google', 'facebook'];
```

Azure credentials are configured in the deployed environment but the provider is not in that list, so Azure login is unreachable. Either finish wiring it or remove the variables.

### Maps, geocoding, and geolocation

| Variable | Purpose |
|----------|---------|
| `MAPS_MAPBOX_ACCESS_TOKEN` | Mapbox tile access for the activity and community maps |
| `MAP_TILES` | Alternative tile server URL |
| `RELOCATION_COUNTRY` | Used by the `relocate` commands when fixing bad coordinates |
| `MAXMIND_USER_ID`, `MAXMIND_LICENSE_KEY` | MaxMind, if the GeoIP service is switched to it |
| `IPAPI_KEY` | The default IP geolocation provider |

Geocoding of addresses during activity registration goes through ArcGIS via `GeocodeController` and needs no key.

### Certificates

| Variable | Purpose |
|----------|---------|
| `PDFLATEX_PATH` | Absolute path to the `pdflatex` binary |

If this is wrong or empty, every certificate operation fails. See [08](08-certificates.md).

### Bot protection

| Variable | Purpose |
|----------|---------|
| `TURNSTILE_SITEKEY` | Cloudflare Turnstile widget key, rendered in the contact form |
| `TURNSTILE_SECRET` | Server-side verification secret. `TURNSTILE_SECRET_KEY` is also accepted |
| `HONEYPOT_ENABLED` | Toggle for `spatie/laravel-honeypot` |
| `HONEYPOT_NAME`, `HONEYPOT_RANDOMIZE` | Honeypot field naming |
| `HONEYPOT_VALID_FROM_TIMESTAMP`, `HONEYPOT_VALID_FROM`, `HONEYPOT_SECONDS` | Timing-based bot detection |

**This used to be silently broken and is worth understanding.** The controller read `TURNSTILE_SECRET_KEY` while deployed environments set `TURNSTILE_SECRET`. Because the verification was wrapped in a truthiness test on a variable that was never set, the CAPTCHA response was validated as `nullable` and **never checked against Cloudflare** — while the widget still rendered, so it looked healthy.

Both spellings now resolve through one config value, so neither can turn verification off by accident:

```20:21:config/codeweek.php
    'turnstile_sitekey' => env('TURNSTILE_SITEKEY', env('TURNSTILE_SITE_KEY')),
    'turnstile_secret' => env('TURNSTILE_SECRET_KEY', env('TURNSTILE_SECRET')),
```

Verification is skipped only when both are blank, which is the intended behaviour locally. Read them with `config('codeweek.turnstile_secret')`, not `env()`, so they survive config caching.

### Monitoring and logging

| Variable | Purpose |
|----------|---------|
| `SENTRY_LARAVEL_DSN` | Sentry project DSN |
| `SENTRY_TRACES_SAMPLE_RATE` | Performance trace sampling |
| `LOG_CHANNEL`, `LOG_STACK`, `LOG_LEVEL` | Logging destination and verbosity |

There is no published `config/sentry.php`; the package auto-discovers its configuration. A custom log channel `mails_sent` writes to `storage/logs/mails_sent.log` and is a useful first stop when someone claims an email never arrived.

### Nova

| Variable | Purpose |
|----------|---------|
| `NOVA_USERNAME`, `NOVA_PASSWORD` | Composer authentication for the paid packages. Build-time only, not runtime |
| `NOVA_SHOW_ERRORS` | Surfaces Nova form validation errors in API responses. Useful for debugging a failing Nova save |
| `NOVA_GUARD` | Auth guard for Nova |
| `NOVA_STORAGE_DISK` | Disk for Nova file upload fields |

### Search (configured but unused)

| Variable | Purpose |
|----------|---------|
| `SCOUT_DRIVER` | Laravel Scout driver |
| `ALGOLIA_APP_ID`, `ALGOLIA_KEY`, `ALGOLIA_SECRET` | Algolia credentials |

**These are not in use.** Search is plain MySQL. Do not assume an index exists.

### Cookie consent

| Variable | Purpose |
|----------|---------|
| `COOKIESCRIPT_ID` | CookieScript account ID, injected into the base layouts |

### Support copilot subsystem

An AI-assisted support pipeline ingests tickets from a Gmail mailbox, triages them, and can open pull requests. It is feature-flagged off by default. Full variable list in [.env.example](../../.env.example) and [config/support_ai.php](../../config/support_ai.php) / [config/support_gmail.php](../../config/support_gmail.php).

| Group | Variables |
|-------|-----------|
| Master switch | `SUPPORT_AI_ENABLED`, `CURSOR_API_KEY` |
| Triage | `SUPPORT_AI_TRIAGE_ENABLED`, `SUPPORT_AI_CLI_BIN`, `SUPPORT_AI_CLI_MODEL`, `SUPPORT_AI_CLI_TIMEOUT` |
| Code changes | `SUPPORT_AI_CODE_CHANGE_ENABLED`, `SUPPORT_AI_CURSOR_API_BASE`, `SUPPORT_AI_CLOUD_MODEL`, `SUPPORT_AI_REPO_URL`, `SUPPORT_AI_DEV_BRANCH`, `SUPPORT_AI_AUTO_CREATE_PR`, `SUPPORT_AI_MAX_POLL_MINUTES` |
| Promotion to live | `SUPPORT_AI_LIVE_PROMOTION`, `SUPPORT_AI_LIVE_BRANCH`, `SUPPORT_GITHUB_REPO`, `SUPPORT_GITHUB_TOKEN` |
| Artisan phase | `SUPPORT_AI_ARTISAN_ENABLED`, `SUPPORT_AI_ARTISAN_ALLOW_RAW`, `SUPPORT_AI_ARTISAN_TIMEOUT`, `SUPPORT_AI_ARTISAN_OUTPUT_LIMIT` |
| Content phase | `SUPPORT_AI_CONTENT_ENABLED`, `SUPPORT_AI_CONTENT_MAX_FIELD_LENGTH` |
| Gmail ingest | `SUPPORT_GMAIL_ENABLED`, `SUPPORT_GMAIL_CREDENTIALS`, `SUPPORT_GMAIL_TOKEN`, plus poll interval, query, label, and allowlist settings |
| Internal API | `SUPPORT_SERVICE_TOKEN` — bearer token for `/api/internal/support/*` |

If you do not intend to operate this subsystem, leave `SUPPORT_AI_ENABLED` and `SUPPORT_GMAIL_ENABLED` false. The scheduled entries for it are conditional on those flags and will not run.

### Miscellaneous

| Variable | Purpose |
|----------|---------|
| `EEDUCATION_CLIENTID` | Client ID for the eeducation.at activity feed. See [07](07-partner-feeds-and-apis.md) |
| `RESOURCES_DROPDOWN_USE_NOVA` | Switches the resources navigation dropdown between Nova-managed and static |
| `STRIPE_KEY`, `STRIPE_SECRET` | Present in `config/services.php` but with no usage found in application code |

## The `config/` directory

22 files. Several are bespoke to this project rather than published Laravel defaults.

| File | Custom? | Notes |
|------|---------|-------|
| `app.php` | Yes | Trimmed right down. Only `locales` and facade aliases for Calendar, Feeds, GeoIP, Image |
| `auth.php` | Yes | Minimal — only the `api` token guard is defined |
| `charts.php` | Yes | Default chart library for the Nova analytics cards |
| [`codeweek.php`](../../config/codeweek.php) | Yes | **The project's own config.** See below |
| `database.php` | No | MySQL, SQLite, Postgres, SQL Server, plus Redis. Includes a `mysql_testing` connection |
| `feed.php` | Yes | `spatie/laravel-feed` — the outbound podcast RSS at `/feed/podcasts` |
| `feeds.php` | Yes | `willvincent/feeds` — the inbound RSS reader. Caching disabled |
| `filesystems.php` | Yes | The five disks listed above |
| `geoip.php` | Yes | Default service is `ipapi`. Falls back to a Brussels location |
| `hashing.php` | No | |
| `honeypot.php` | No | |
| `livewire.php` | Yes | Components resolve from `App\Livewire`, views from `resources/views/livewire` |
| `logging.php` | Yes | Adds the `mails_sent` channel |
| `mail.php` | No | SMTP and Mailgun mailers |
| `menus.php` | Yes | The resources dropdown toggle |
| `nova.php` | No | Nova mounted at `/nova` |
| `permission.php` | No | spatie tables and models |
| `purify.php` | No | HTML sanitisation profiles, used on CMS-editable fields |
| `services.php` | No | Mailgun, Stripe, and the Socialite providers |
| `support_ai.php` | Yes | Support copilot phases |
| `support_gmail.php` | Yes | Support mailbox ingest |
| `vue-i18n-generator.php` | Yes | Output path for the legacy Vue translation generator |

**Not published, so framework defaults apply:** `queue.php`, `cache.php`, `session.php`, `broadcasting.php`, `sanctum.php`, `sentry.php`, `activitylog.php`, `scout.php`. If you need to change queue or cache behaviour beyond what the environment variables allow, you will need to publish the relevant file first.

### `config/codeweek.php`

The project's own configuration file, and the first place to look when a project-specific value seems to come from nowhere:

```1:15:config/codeweek.php
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
```

Note that `blog_url` defaults to the live blog. On a dev or local environment the blog sync command will therefore pull from **production** unless `BLOG_URL` is set explicitly. See [09](09-wordpress-blog.md).

## Locales

`LOCALES` currently lists 27 codes:

```
al, ba, bg, cs, da, de, el, en, es, et, fi, fr, hr, hu, it, lt, lv,
me, mk, nl, pl, pt, ro, rs, sk, sl, sv
```

`resources/lang/` contains directories beyond this list (including `tr`, `ua`, and `mt`). Those translations exist but are not exposed in the language switcher, because the switcher is driven by `LOCALES`. If a stakeholder asks why a language they translated is not appearing, this variable is the answer. See [11](11-testing-and-local-dev.md) for how translation files are structured.
