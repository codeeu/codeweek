# 10 — Scheduled jobs and runbooks

## Where the schedule lives

Laravel 11 has no `app/Console/Kernel.php`. **The entire cron schedule is in [routes/console.php](../../routes/console.php)** — 62 lines. That is the whole thing.

It only runs if Forge has a `schedule:run` cron entry on the server. That entry is **not in this repository**. If every automated behaviour on the site stops at once, check that first.

```bash
# on the server
php artisan schedule:list
```

## The schedule

| Time | Command | What it does | Chapter |
|------|---------|--------------|---------|
| Hourly | `inspire` | Prints a quote. Harmless framework default | |
| Hourly :05 | `rss:meetandcode` | Imports Meet and Code activities from RSS | [07](07-partner-feeds-and-apis.md) |
| Hourly :10 | `api:germany` | Legacy per-city German feeds. Largely a no-op | [07](07-partner-feeds-and-apis.md) |
| Hourly :13 | `magic:key` | Regenerates user `magic_key` tokens for unsubscribe links | [04](04-domain-model.md) |
| Hourly :15 | `api:germany-central --import` | The live German import | [07](07-partner-feeds-and-apis.md) |
| Hourly :30 | `notify:administrators` | Emails admins about activities awaiting attention | |
| Hourly :30 | `relocate` | Fixes activities with missing or bad coordinates | |
| Hourly :33 | `certificate:issues` | Detects certificates with generation problems | [08](08-certificates.md) |
| Every 2 min | `relocate:country` | Country-level coordinate repair | |
| Every minute | `support:gmail:poll --max=10` | Support mailbox ingest. **Only if `support_gmail.enabled`** | |
| Every minute | `support:ai:poll-agents` | Support copilot agent polling. **Only if both support AI flags are on** | |
| Daily 01:00 | `app:sync-blogs` | Pulls WordPress posts into the `blogs` table | [09](09-wordpress-blog.md) |
| Daily 01:00 | `events:generate-recurring` | Materialises recurring activity instances | |
| Daily 04:00 | `import:eeducation` | eeducation.at activity feed | [07](07-partner-feeds-and-apis.md) |
| Daily 09:00 | `remind:ambassadors` | Reminds ambassadors about pending moderation | |
| Daily 10:00 | `remind:creators` | Reminds organisers to report on finished activities | [08](08-certificates.md) |
| Daily 12:05 | `clean:remote` | Removes imported activities that vanished upstream | [07](07-partner-feeds-and-apis.md) |
| Weekly Thu 08:00 | `delete:unactiveusers` | GDPR deletion of users without consent | [04](04-domain-model.md) |
| Disabled | `certificates:fix` | Commented out. Leave it that way | [08](08-certificates.md) |

### A removed entry, for context

The schedule used to contain `app:export-search-data-to-json` at 02:00 daily. No such command was registered anywhere in the codebase — the only occurrence of that string was the scheduler line itself — so the scheduler failed every night. Nothing depended on it and the line has been deleted.

Worth noting as a pattern: a permanently failing schedule entry trains everyone to ignore scheduler errors, which is how a real failure goes unnoticed. If you add a `Schedule::command()` line, confirm it appears in `php artisan schedule:list` and actually runs.

### Two entries with a name collision worth double-checking

`relocate` (hourly at :30) and `relocate:country` (every two minutes) both resolve to `app/Console/Commands/RelocateCountry.php`. Confirm on the server with `php artisan schedule:list` which signature each actually binds to, and whether running a geocoding repair **every two minutes** is still intended.

### Support subsystem entries are conditional

```47:48:routes/console.php
$supportGmailPoll = Schedule::command('support:gmail:poll --max=10')
    ->when(fn () => (bool) config('support_gmail.enabled'));
```

Both support entries are wrapped in `->when()` checks on their feature flags, so with the flags off they cost nothing. See [03](03-configuration.md).

## Queues

There is **no Horizon and no supervisor configuration in this repository.** Worker definitions live in Forge. Check them during handover and note the queue names, worker count, and timeout.

### What depends on a worker

| Work | Job class |
|------|-----------|
| Bulk activity upload validation | `ValidateBulkEventUploadJob` (timeout 1800s, `tries = 1`) |
| Bulk activity import | `ProcessBulkEventImportJob` (timeout 3600s, `tries = 1`) |
| Certificate batch generation | `GenerateCertificateBatchJob` |
| Certificate batch sending | `SendCertificateBatchJob` |
| Participation certificates | `GenerateCertificatesOfParticipation` |
| Missing certificates | `MissingCertificate` |
| GDPR user deletion | `ProcessUserDeletion` |
| Activity relocation | `RelocateEvent` |
| Support copilot work | `app/Jobs/Support/` |
| **Almost all outgoing mail** | Sent with `Mail::queue()` |

That last row is the one people forget. **No worker means no email** — not just certificates, but moderation notifications, reminders, and contact form delivery.

Both bulk jobs have `tries = 1`, so a transient failure is final. Re-upload rather than waiting for a retry.

`php artisan queue:restart` must run on every deploy. Workers hold code in memory, and for certificates that means LaTeX templates — see [08](08-certificates.md).

## About the ~150 Artisan commands

`app/Console/Commands/` holds **151 files**. Most are one-off partner imports or data fixes that will never run again.

The ones that matter divide into three groups:

1. **Scheduled** — the table above. These run whether you think about them or not.
2. **Operational** — run deliberately during the annual cycle: the certificate commands ([08](08-certificates.md)), `notify:winners`, `notify:superorganisers`, `link:lt`.
3. **Everything else** — archaeology. Partner-specific importers, historical backfills, and abandoned experiments.

When you meet an unfamiliar command, check whether it appears in `routes/console.php` or in a runbook. If it does not, assume it is group three until proven otherwise.

---

# Runbooks

## Deploy a change

1. Branch from `dev`, open a PR into `dev`.
2. Forge deploys `dev` to [dev.codeweek.eu](https://dev.codeweek.eu/).
3. QA on dev. **Nova changes must be checked by hand** — CI does not cover Nova ([02](02-environments-and-deployment.md)).
4. PR from `dev` into `master`.
5. Forge deploys to [codeweek.eu](https://codeweek.eu).
6. Confirm `php artisan queue:restart` ran.
7. If the release contained migrations, confirm they applied: `php artisan migrate:status`.

Avoid deploying during October unless it is a fix. Traffic, registrations, and moderation volume all peak then.

## Run a bulk activity upload

Full detail in [06](06-bulk-uploads-and-imports.md).

1. **Do it on dev first.** Every time, no exceptions.
2. Check the file's headers against `BulkEventUploadValidator::REQUIRED_COLUMNS`. All 17 must be present.
3. Go to `/admin/bulk-upload` as a super admin.
4. Set a `default_creator_email` if the file has no `creator_id`, to avoid accidental user creation.
5. Upload. The header check is immediate; validation is queued.
6. **Read the preview.** Bulk-uploaded activities are created `APPROVED` and skip moderation, so a bad file publishes instantly.
7. Fix the spreadsheet and re-upload if failures are significant. Re-running updates matched rows rather than duplicating them.
8. Import, then read the report.
9. Repeat on live.
10. Spot-check a few activities on the public map.

Expect a brief performance dip on live afterwards — the import calls `Cache::flush()`.

## Onboard a national partner

Covered in [07](07-partner-feeds-and-apis.md). In short: prefer the spreadsheet route, point them at the [public wiki guide](https://github.com/codeeu/codeweek/wiki/Publish-your-events-into-Codeweek), and only build a feed importer if they need continuous sync.

## New edition rollover

Do this before the new Code Week year begins.

1. **Certificate templates.** Create `excellence-{year}.tex`, `excellence_greek-{year}.tex`, `super-organiser-{year}.tex`, `super-organiser_greek-{year}.tex`. Refresh the non-versioned Recognition and Participation templates and the artwork. [08](08-certificates.md)
2. **Deploy, then restart workers.** Non-negotiable — otherwise last year's design goes out silently.
3. **Preflight** with `certificate:preflight` and `certificate:test-two`.
4. **Check the taxonomies.** If themes or audiences changed, update the database, the `Event` constants, the translation files, and the wiki page — together.
5. **Refresh the wiki guide and the template spreadsheet** if the column contract changed.
6. **Check the CMS pages.** Homepage slides, campaign pages, and the Grassroots Grants content are all editorially managed in Nova and usually need a refresh.
7. **Capacity check** ahead of October: queue workers, database headroom, S3 costs.

## Issue certificates for an edition

[08](08-certificates.md) has the detail. The shape:

```bash
php artisan excellence {edition}
php artisan superorganisers {edition}
php artisan certificate:preflight
php artisan notify:winners {edition}
php artisan notify:superorganisers {edition}
php artisan certificate:failures-report
php artisan certificate:retry-failed
```

Remember the `/admin/certificate-backend/*` UI is gated on a hardcoded email address that must be changed first ([00](00-access-checklist.md)).

## Regenerate one certificate

1. Find the recipient in `/admin/certificate-backend/list`.
2. Use `/regenerate/{id}` for a new PDF at the same URL, or `/resend/{id}` to re-email the existing one.
3. From the CLI: `php artisan certificate:regenerate-in-place`.
4. If it fails, read the `.log` left behind on the `latex` disk and check `certificate_generation_error` on the row.

## Publish Learn & Teach resources

Follow [docs/ops/learn-and-teach-resource-import.md](../ops/learn-and-teach-resource-import.md) — it is the most complete runbook we have. Two reminders: read Excel **hyperlink targets**, not cell text, and be aware that dev usually writes to the **production** resources bucket.

## October readiness

Roughly a quarter of the year's visits land in October — October 2024 recorded 99,770 visits, 32,669 unique visitors and 1.49 million actions in that single month. Traffic then holds through spring rather than collapsing, because teachers discover Code Week in October and return when planning the next term.

A fortnight beforehand:

- [ ] Confirm the schedule is registered: `php artisan schedule:list`.
- [ ] Confirm queue workers are alive and draining. See the note below — **`queue:monitor` needs arguments and will not alert anyone on its own.**
- [ ] Check for a backlog of failures: `php artisan queue:failed`. Clear anything stale before the spike so October failures are visible.
- [ ] Confirm the German central import is succeeding: `php artisan api:germany-central`. **Dry-run is the default**; it only writes when you add `--import`, so this is safe to run against live.
- [ ] Verify the database backup by restoring one. Backups are not configured in this repository — there is no `spatie/laravel-backup` — so they are managed in Forge/AWS. The commitment is nightly database and weekly file backups with restore tests.
- [ ] Check Sentry for recurring errors and clear the noise so real ones stand out.
- [ ] Confirm Site24x7 monitoring is active and alerting somewhere someone reads.
- [ ] Check the moderation queue at `/pending` is empty and ambassadors know volume is coming. `/pending` and `/review` are both behind `role:super admin|ambassador`.
- [ ] Freeze non-essential deploys.
- [ ] Confirm `certificate:preflight` passes, since reporting begins as soon as October activities end. It defaults to the current year; pass `--edition` when checking any other.

### Checking the queue properly

`php artisan queue:monitor` on its own fails with `Not enough arguments (missing: "queues")`. It takes a required `connection:queue` list:

```bash
# confirm what the connection actually is first - it must not be 'sync' on live
php artisan tinker --execute="echo config('queue.default');"

php artisan queue:monitor database:default   # or redis:default, matching the above
```

Two caveats that make this weaker than it looks:

- `queue:monitor` only **dispatches a `QueueBusy` event** when a queue exceeds `--max`. There is no listener for that event anywhere in this application, so nothing is emailed or alerted. Run interactively and read the table, or register a listener if you want real alerting.
- No job in this codebase calls `onQueue()`, so everything sits on the single default queue. There is no Horizon either. Worker health is therefore a Forge question, not an application one — check the daemon status in Forge alongside the commands above.

A useful one-liner for confirming the effective drivers on a host:

```bash
php artisan about
```

## An activity is not appearing on the map

Work through in order:

1. Is `status` `APPROVED`? Pending activities are invisible to the public.
2. Does it have valid `latitude`, `longitude`, and `geoposition`? Missing coordinates are the most common cause. `relocate` and `relocate:country` run on a schedule to repair these.
3. Is it soft-deleted? Query with `withTrashed()`.
4. Map data is cached for **300 seconds** — wait, or clear the cache.
5. Is `end_date` in the year being filtered on? Year filtering uses `end_date`, not `start_date`.

## Someone says they never received an email

1. Is there a **running queue worker**? Nearly all mail is queued.
2. Check `storage/logs/mails_sent.log` — the `mails_sent` channel is there for exactly this.
3. Check the mail provider's own logs for a bounce or suppression.
4. For certificate mail specifically, check `certificate_sent_error` on the `excellences` row.

## A user has disappeared

1. Query `users` with `withTrashed()` — they are probably soft-deleted.
2. Check whether `delete:unactiveusers` removed them for missing consent ([04](04-domain-model.md)).
3. Their activities will have been reassigned to the legacy user with id `1000000`.
4. Restoring means undoing the soft delete **and** reassigning records back. There is no one-step restore. If it is a GDPR deletion, confirm restoring it is lawful before you do.

## The whole site is misbehaving after a deploy

1. `php artisan migrate:status` — did migrations apply?
2. Did `queue:restart` run? Stale workers cause behaviour that looks like the deploy did not happen.
3. `php artisan config:clear`, `cache:clear`, `view:clear`.
4. Check Sentry.
5. Confirm `npm run build` succeeded on the server — a failed asset build leaves the site styled with stale files.
