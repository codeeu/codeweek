# 12 — Risks and known issues

This chapter used to be a long inventory. Most of it has since been fixed — see [what was fixed](#what-was-fixed) at the end for the list, so you are not surprised by references to it elsewhere.

What remains is grouped by what you need to do about it: one thing that will lock you out, a few open security actions, behaviour you must understand before touching imports or certificates, and a set of accepted gaps.

## This will lock you out on day one

The certificate backend is gated on a single hardcoded email address belonging to the outgoing developer:

```11:11:app/Http/Middleware/EnsureSuperCertificateAdmin.php
    private const ALLOWED_EMAIL = 'bernard@matrixinternet.ie';
```

Everything under `/admin/certificate-backend/*` — batch generation, sending, retrying failures, manual creation — depends on it. **No role grants access.** A new super admin gets a 403 and cannot operate certificates at all.

This was deliberately left unchanged so the incoming team can decide the access model rather than inherit ours. The options, roughly in order of preference:

- an environment-driven allowlist, so access follows a variable rather than a deploy;
- a Spatie permission such as `generate certificate`, which already exists in the seeder;
- the `super admin` role, which is simplest but means every super admin can send certificate batches.

Whichever you choose, do it before October, because certificate reporting starts the moment October activities end. [08](08-certificates.md)

## Open security actions

**The `forge` SSH keys should be rotated.** [docs/ops/learn-and-teach-resource-import.md](../ops/learn-and-teach-resource-import.md) contained the live and dev server IP addresses with working `ssh -i ~/.ssh/id_rsa forge@…` command lines, in the **public** `codeeu/codeweek` repository. The file now uses placeholders, but **redaction does not remove them from git history.** The real mitigation is rotating those keys, restricting SSH ingress at the AWS security group, or both.

**The previously committed `APP_KEY` should be treated as compromised.** `.env.example` shipped a real base64 key for a long time. It is blank now, but any environment created by copying that file is using a publicly known encryption key. Rotate it wherever it was used, and remember that rotating `APP_KEY` invalidates existing encrypted values and sessions.

**`User` is fully mass-assignable.**

```110:110:app/User.php
    protected $guarded = [];
```

Every attribute is mass-assignable, including `approved` and `magic_key`. Any `fill()` or `update()` reached with unfiltered request data is a privilege-escalation path. This was left alone because moving to an explicit `$fillable` touches a lot of call sites and is exactly the kind of change that breaks quietly. Audit the call sites first, then narrow it.

**The public API is unauthenticated.** `/api/events/geobox`, `/api/events/germany`, and `/api/event-detail/{event}` have no API key, no token, and no per-consumer limit beyond a global 60-requests-per-minute throttle. That may well be right for open data, but it should be a decision someone has made rather than an accident. [07](07-partner-feeds-and-apis.md)

## Behaviour to understand before you touch imports

None of these are bugs exactly. They are design choices with sharp edges, and each one has surprised somebody.

**Restart workers after changing LaTeX templates.** The most important piece of inherited knowledge in this document. Long-running queue workers hold templates in memory, so if you skip `php artisan queue:restart` after a template change, certificates are generated **silently using last year's design** — no error, and by the time anyone notices they have been emailed. [08](08-certificates.md)

**Bulk-uploaded activities skip moderation.** `GenericEventsImport` sets `status = 'APPROVED'` on every row, so a bad spreadsheet publishes straight to the live map. The preview step is the only safeguard — always read it. [06](06-bulk-uploads-and-imports.md)

**Creator resolution can misattribute activities.** When a row's `contact_email` does not match a user exactly, the importer falls back to matching on the local part before the `@`:

```152:156:app/Imports/GenericEventsImport.php
        [$local] = explode('@', $contactEmail, 2);
        $user = User::where('email', 'like', "{$local}@%")->first();
        if ($user) {
            return $this->creatorIdByEmail[$contactEmail] = $user->id;
        }
```

So `jane@school-a.be` can be attributed to an existing `jane@somewhere-else.com`. If ownership looks wrong after an import, this is why. It also means **a bulk upload can create user accounts as a side effect**.

**A bulk import flushes the entire application cache.**

```65:66:app/Jobs/ProcessBulkEventImportJob.php
            Storage::disk($disk)->delete($path);
            Cache::flush();
```

Not just the upload's own entries — everything, including the map cache and GeoIP lookups. Expect a performance dip on live after a large import. Narrowing this to targeted keys would be a cheap improvement, but it needs someone to enumerate the keys safely rather than guess.

**Duplicate detection is strict.** `BulkEventDuplicateFinder` matches on title, start date, country and organiser, plus address or coordinates. Change any one of those in a corrected spreadsheet and you get a second activity rather than an update.

**Theme and audience IDs are a public contract.** Partners submit numeric theme and audience IDs taken from the [public wiki page](https://github.com/codeeu/codeweek/wiki/Publish-your-events-into-Codeweek). Theme IDs are deliberately non-contiguous after a past consolidation. **Renumbering them breaks historical activities and every partner's export script simultaneously.** [04](04-domain-model.md)

The column list is now pinned by `tests/Unit/BulkEventUploadColumnContractTest.php`, so changing `REQUIRED_COLUMNS` fails the suite with a reminder to update the wiki. Nothing pins the theme and audience IDs; treat them as frozen.

**The GDPR deletion script is irreversible.** [soft_delete_users_without_consent.sql](../../soft_delete_users_without_consent.sql) performs soft deletes and hard deletes in one pass, reassigning records to the legacy user with id `1000000`. There is no undo without a database backup. Take one first, every time. That literal `1000000` is load-bearing in several places. [04](04-domain-model.md)

**Blog sync never removes anything.** `app:sync-blogs` only upserts, so a post deleted or unpublished in WordPress stays in the `blogs` table forever and keeps appearing in site search, linking to a 404. There is no reconciliation pass. [09](09-wordpress-blog.md)

## Accepted gaps

These are known, and were left alone deliberately — either because fixing them needs access or decisions we do not have, or because the fix is riskier than the problem.

**Testing and CI.** CI swaps in `composer-test.json`, which strips the Nova packages, so **no Nova code is exercised by CI at all** — every Nova change needs manual QA on dev. Tests also run on SQLite while production is MySQL, so the JSON and `FIND_IN_SET` paths in `app/Filters/EventFilters.php` cannot be covered by the default suite; a `mysql_testing` connection exists, commented out, in `phpunit.xml`. Two tests currently fail on `master` for unrelated legacy reasons: `UserRestoreServiceTest`, and `CommunityAmbassadorFilteringTest` because `database/factories/CityFactory.php` is still in the pre-Laravel-8 `$factory->define()` format. Five further files in `tests/Feature/` lack the `Test.php` suffix and never run; renaming them would make them execute, so check they pass before doing it. [11](11-testing-and-local-dev.md)

**Nothing alerts on a backed-up queue.** `queue:monitor` only dispatches Laravel's `QueueBusy` event above a threshold, and no listener for it exists. There is no Horizon, and no job calls `onQueue()`, so all work shares one uninstrumented queue. In practice a stalled worker during October is noticed by a human wondering why activities are not appearing. A `QueueBusy` listener that notifies the on-call address is a small, high-value change. Related: both `ValidateBulkEventUploadJob` and `ProcessBulkEventImportJob` set `tries = 1`, so a transient failure in a long import is final and you re-upload. [10](10-scheduled-jobs-and-runbooks.md)

**Environment and infrastructure.** The `schedule:run` cron entry, the queue workers, the server `.env` and the nginx configuration exist only in Forge — no amount of reading this repository tells you whether they are correct, so export them during handover. Dev commonly shares `RESOURCES_BUCKET` with live, meaning a resource import on dev uploads real PDFs into the production bucket while the rows stay on dev. `config/codeweek.php` defaults `blog_url` to the live blog, so a dev `app:sync-blogs` pulls production content unless the variable is set. `devspace.yaml` still pins a PHP 8.0 FPM image while `composer.json` requires `^8.2`; we left the tag alone because we cannot verify what exists in that private registry. [02](02-environments-and-deployment.md)

**Half-finished and architectural.** `AZURE_CLIENT_ID`, `AZURE_CLIENT_SECRET` and `AZURE_REDIRECT` are set in the deployed environment, but `LoginController` allowlists only twitter, github, google and facebook — finish it or remove the variables. Nova resources must be registered manually in `NovaServiceProvider::boot()`, because auto-discovery was missing them; add a resource and forget the array and it will not appear. `SCOUT_DRIVER` and the Algolia variables exist but nothing uses them: all search is direct MySQL, so do not assume an index exists, and expect search to be a pressure point in October. `RejectEvent` in Nova has no message field, so the `Moderation` record it writes has an empty `message` and the organiser gets no explanation, while the Blade screens at `/pending` and `/review` do capture a reason — two paths, two behaviours, and ambassadors use both. `EventPolicy::edit()` returns false once `reported_at` is set, with no explanatory message in the UI; intentional, but a steady source of support tickets.

**Navigational debt.** Of 151 files in `app/Console/Commands/`, only about twenty are scheduled or operationally relevant; the rest are partner-specific importers and historical backfills that will never run again. `app/Console/Commands/excel/` is the obvious first candidate for a cleanup pass. Both `relocate` and `relocate:country` resolve to `app/Console/Commands/RelocateCountry.php` and one is scheduled every two minutes — confirm with `php artisan schedule:list` on the server what actually binds and whether that frequency is still wanted. Many long-lived branches are named after dates or import batches (`bulk_11_11_25`, `2-sept-imports`, `coderdojo-import-april`), so do not assume an unfamiliar branch is active. CI triggers on `master` while `docs/ops/` refers to "`main` / `master`"; confirm in Forge which branch each site deploys from.

**Documentation.** `docs/internal/` is gitignored and holds sample payloads, partner spreadsheets and past import reports — genuinely useful reference material that must be transferred **outside git**. One inherited document, `WP5 CodeWeek IT System Merged v0.5.md`, states that geocoding uses Nominatim; it does not, the code calls the ArcGIS World GeocodeServer through `GeocodeController`. Worth knowing if that document is circulated to stakeholders.

## What was fixed

Done in a single pass, with the test suite green apart from the two pre-existing failures noted above. Listed so that references elsewhere make sense, and so nobody re-reports them.

- **Turnstile bot protection never ran.** The code read `TURNSTILE_SECRET_KEY` while deployed environments set `TURNSTILE_SECRET`, so verification was wrapped in a truthiness check on an always-null variable and the CAPTCHA response was validated as `nullable`. The widget rendered, so it looked healthy. Both names now resolve through `config/codeweek.php`. **This needs a live submission test on dev** — it is the one change here that alters behaviour on a public form.
- **The contact form fell back to the outgoing team's address** when `CONTACT_FORM_RECIPIENT_EMAIL` was unset. It now falls back to `ADMIN_EMAIL`.
- **Every ambassador saw only France** in the Nova `Country` resource, which was leftover debug code. Now scoped to the ambassador's own `country_iso`.
- **`Ambassador` filtered on `model_has_roles.role_id = 4`**, which only held while the seeders had run in their original order. Now matched by role name.
- **A scheduled command that did not exist**, `app:export-search-data-to-json`, failed nightly at 02:00. Removed.
- **`certificate:preflight` defaulted to `--edition=2025`**, so a bare run silently checked the wrong year. Now defaults to the current year.
- **`.env.example` shipped a real `APP_KEY`** plus live S3 bucket names, used the ignored `QUEUE_DRIVER` name instead of `QUEUE_CONNECTION`, and omitted about forty variables the application reads. Blanked, renamed, and filled in by name.
- **Dead code deleted**: the two `nova-components/` packages that were never installed, `PromoteAmbassador`, the unattached `UserStatus` filter, the unrouted `ImporterController`, and the `/map` route whose only view include was a zero-byte file.
- **Committed debris deleted**: `cookies.txt` (a curl cookie jar with a live session cookie for meet-and-code.org), `texput.log`, `changed_files.txt`, `differences.diff`, `bom.json`, `phpunit.xml.bak`, `tailwind.js`, `server.php`, the LaTeX compile leftovers in `resources/latex/`, and the abandoned Travis configuration. `.gitignore` now covers the recurring ones.
- **CI ran only for `master`**, so pull requests into `dev` ran no tests. Both branches now trigger.
- **The bulk upload column contract is pinned** by a unit test, so changing `REQUIRED_COLUMNS` fails the suite with a reminder to update the partner-facing wiki.

## Suggested order of work

1. **Decide the certificate access model** and replace the hardcoded email. Until this is done you cannot operate certificates.
2. **Close the security actions.** Rotate the `forge` SSH keys, rotate `APP_KEY` where the committed one was used, and confirm `TURNSTILE_SECRET` is valid by submitting the contact form on dev.
3. **Verify the invisible parts.** Prove the scheduler runs, the workers are alive, a backup restores, and Sentry is receiving. Export the Forge configuration while you have someone to ask.
4. **Make the suite trustworthy.** Fix the two failing tests, then decide about the five inert files. A green suite is what makes everything after this cheaper.

Then, before October: the readiness checklist in [10](10-scheduled-jobs-and-runbooks.md).
