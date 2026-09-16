# 12 — Risks and known issues

Grouped by what you need to do about it: actions that need access or credentials we cannot use on your behalf, behaviour you must understand before touching imports or certificates, and a set of gaps left open deliberately. A record of what was fixed is at the end, so references to it elsewhere make sense.

## Actions that need your credentials

These are the only items that cannot be closed from the repository. Each needs someone with infrastructure access.

**Set `CERTIFICATE_ADMIN_EMAILS` before your next deploy.** Access to `/admin/certificate-backend/*` used to be a single hardcoded email address belonging to the outgoing developer. It is now a comma-separated allowlist read from the environment, and it **fails closed** — if the variable is blank, nobody gets in and the 403 says so. Set it in Forge for both dev and live, then confirm you can reach the certificate backend. Do this before October, because certificate reporting starts the moment October activities end. [08](08-certificates.md)

**Rotate the `forge` SSH keys.** [docs/ops/learn-and-teach-resource-import.md](../ops/learn-and-teach-resource-import.md) contained the live and dev server IP addresses with working `ssh -i ~/.ssh/id_rsa forge@…` command lines, in the **public** `codeeu/codeweek` repository. The file now uses placeholders, but **redaction does not remove them from git history.** The real mitigation is rotating those keys, restricting SSH ingress at the AWS security group, or both.

**Treat the previously committed `APP_KEY` as compromised.** `.env.example` shipped a real base64 key for a long time. It is blank now, but any environment created by copying that file is using a publicly known encryption key. Rotate it wherever it was used, and remember that rotating `APP_KEY` invalidates existing encrypted values and sessions.

**Confirm Turnstile actually verifies.** Bot protection on the contact form never ran, because the code read `TURNSTILE_SECRET_KEY` while deployed environments set `TURNSTILE_SECRET`. Both names now resolve, which means verification is switched on for the first time. If the configured secret is stale, contact form submissions will start failing. **Submit the form on dev before merging to live.**

**Decide whether the public API should stay open.** `/api/events/geobox`, `/api/events/germany`, and `/api/event-detail/{event}` have no API key, no token, and no per-consumer limit beyond a global 60-requests-per-minute throttle. That may well be right for open data, but it should be a decision someone has made rather than an accident. [07](07-partner-feeds-and-apis.md)

## Behaviour to understand before you touch imports

None of these are bugs. They are design choices with sharp edges, and each one has surprised somebody.

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

Not just the upload's own entries — everything, including the map cache and GeoIP lookups. Expect a performance dip on live after a large import. Narrowing this to targeted keys would be a cheap improvement, but it needs someone to enumerate the keys safely rather than guess, and guessing wrong means stale data on the public map.

**Duplicate detection is strict.** `BulkEventDuplicateFinder` matches on title, start date, country and organiser, plus address or coordinates. Change any one of those in a corrected spreadsheet and you get a second activity rather than an update.

**Theme and audience IDs are a public contract.** Partners submit numeric theme and audience IDs taken from the [public wiki page](https://github.com/codeeu/codeweek/wiki/Publish-your-events-into-Codeweek). Theme IDs are deliberately non-contiguous after a past consolidation. **Renumbering them breaks historical activities and every partner's export script simultaneously.** [04](04-domain-model.md)

The column list is pinned by `tests/Unit/BulkEventUploadColumnContractTest.php`, so changing `REQUIRED_COLUMNS` fails the suite with a reminder to update the wiki. Nothing pins the theme and audience IDs; treat them as frozen.

**The GDPR deletion script is irreversible.** [soft_delete_users_without_consent.sql](../../soft_delete_users_without_consent.sql) performs soft deletes and hard deletes in one pass, reassigning records to the legacy user with id `1000000`. There is no undo without a database backup. Take one first, every time. That literal `1000000` is load-bearing in several places. [04](04-domain-model.md)

**Editing an activity's Status directly in Nova sends no email.** `Event::approve()` and `Event::reject()` are what queue the organiser's notification and write the moderation record. The Nova Status dropdown writes the column and nothing else. Ambassadors have full edit rights on activities in their own country, so this is easy to do by accident — use the Approve and Reject actions. [14](14-accounts-and-moderation.md)

**Blog sync never removes anything.** `app:sync-blogs` only upserts, so a post deleted or unpublished in WordPress stays in the `blogs` table forever and keeps appearing in site search, linking to a 404. Adding a reconciliation pass is not hard, but making it delete rows on the strength of one API response is how you lose the archive if the WordPress API returns a partial page. If you build it, drive it from an explicit opt-in flag and log what it would remove before it removes anything. [09](09-wordpress-blog.md)

## Gaps left open deliberately

**`User` is still fully mass-assignable apart from one column.**

```110:112:app/User.php
    // 'approved' controls whether a leading teacher is listed publicly, so it must
    // never be settable from request data. Set it explicitly instead of mass-assigning.
    protected $guarded = ['approved'];
```

`approved` is now guarded, because that was the one genuine privilege-escalation path — it controls whether someone is listed publicly. Everything else remains mass-assignable. Narrowing this further to an explicit `$fillable` means auditing every `User::create()` and `fill()` call in the importers, the German sync, the social login service and the helpers, and the failure mode is a silently dropped column rather than an error. Worth doing, but do it with the suite in front of you, one call site at a time. Note that `id` **must** stay assignable: `SoftDeleteUsersWithoutConsent` relies on mass-assigning `1000000` to create the legacy placeholder user.

**No Nova code is exercised by CI.** CI swaps in `composer-test.json`, which strips the Nova packages. Every Nova change needs manual QA on dev. [11](11-testing-and-local-dev.md)

**Tests run on SQLite, production runs MySQL 8.** The `JSON_CONTAINS` and `FIND_IN_SET` paths in `app/Filters/EventFilters.php` cannot be covered by the default suite. A `mysql_testing` connection exists, commented out, in `phpunit.xml`; switch to it locally if you touch the filter layer. [11](11-testing-and-local-dev.md)

**Two factory systems coexist.** `database/factories/` holds seventeen modern class factories and fourteen legacy `$factory->define()` closures, the latter working only because `laravel/legacy-factories` is still installed. `Model::factory()` works for one set, the `create()` and `make()` helpers for the other, and the error when you pick wrong is unhelpful. [11](11-testing-and-local-dev.md)

**Environment and infrastructure are invisible from here.** The `schedule:run` cron entry, the queue workers, the server `.env` and the nginx configuration exist only in Forge — no amount of reading this repository tells you whether they are correct, so export them during handover. Dev commonly shares `RESOURCES_BUCKET` with live, meaning a resource import on dev uploads real PDFs into the production bucket while the rows stay on dev. `config/codeweek.php` defaults `blog_url` to the live blog, so a dev `app:sync-blogs` pulls production content unless the variable is set. `devspace.yaml` still pins a PHP 8.0 FPM image while `composer.json` requires `^8.2`; we left the tag alone because we cannot verify what exists in that private registry. [02](02-environments-and-deployment.md)

**Half-finished features.** `AZURE_CLIENT_ID`, `AZURE_CLIENT_SECRET` and `AZURE_REDIRECT` are set in the deployed environment, but `LoginController` allowlists only twitter, github, google and facebook — finish it or remove the variables. `SCOUT_DRIVER` and the Algolia variables exist but nothing uses them: all search is direct MySQL, so do not assume an index exists, and expect search to be a pressure point in October. `EventsQuery::trigger()` tests `status = 'FEATURED'`, but `FEATURED` is a value of `highlighted_status`, so that branch can never match; it is harmless, and left alone because removing a condition that filters live listings deserves a look at production data first. `App\Http\Controllers\ModerationController` is an empty scaffold, and the `moderate event` permission is seeded for ambassadors but never checked — every moderation check tests the role name instead, so granting that permission to another role achieves nothing.

**Nova resources must be registered by hand.** Auto-discovery was missing them, so `NovaServiceProvider::boot()` lists them explicitly. Add a resource, forget the array, and it will not appear in the sidebar. [05](05-nova-admin.md)

**`EventPolicy::edit()` returns false once `reported_at` is set**, with no explanatory message in the UI. Intentional, but a steady source of support tickets.

**Import jobs do not retry.** Both `ValidateBulkEventUploadJob` and `ProcessBulkEventImportJob` set `tries = 1`, so a transient failure in a long import is final and you re-upload. [10](10-scheduled-jobs-and-runbooks.md)

**Navigational debt.** Of 151 files in `app/Console/Commands/`, only about twenty are scheduled or operationally relevant; the rest are partner-specific importers and historical backfills that will never run again. `app/Console/Commands/excel/` is the obvious first candidate for a cleanup pass. `relocate` and `relocate:country` are genuinely different commands — the first repositions online activities stuck at `0,0`, the second re-geocodes activities sitting on a country centroid — and the second is scheduled every two minutes, so confirm with `php artisan schedule:list` on the server that the frequency is still wanted. Many long-lived branches are named after dates or import batches (`bulk_11_11_25`, `2-sept-imports`, `coderdojo-import-april`), so do not assume an unfamiliar branch is active.

**Documentation.** `docs/internal/` is gitignored and holds sample payloads, partner spreadsheets and past import reports — genuinely useful reference material that must be transferred **outside git**. One inherited document, `WP5 CodeWeek IT System Merged v0.5.md`, states that geocoding uses Nominatim; it does not, the code calls the ArcGIS World GeocodeServer through `GeocodeController`. Worth knowing if that document is circulated to stakeholders.

## What was fixed

The test suite is green. Listed so that references elsewhere make sense, and so nobody re-reports them.

### Security and access

- **The certificate backend was gated on one hardcoded personal email address**, with no role granting access, so a new super admin got a 403 and could not operate certificates at all. It is now an environment-driven allowlist that fails closed, covered by `tests/Feature/CertificateBackendAccessTest.php`.
- **Any ambassador could reject any country's activities.** `EventController@reject` called `$this->authorize()` inside a `try` with an empty `catch`, so the country check was defeated while the identical check on `approve` was enforced. The exception is no longer swallowed, and two tests pin in-country and out-of-country behaviour.
- **`users.approved` was mass-assignable**, so any future `update($request->all())` could have published or hidden a leading teacher. Now guarded.
- **A hardcoded `remember_token` and a predictable password** were used when creating the legacy placeholder user in `SoftDeleteUsersWithoutConsent`. Both are now random.
- **Turnstile bot protection never ran.** The code read `TURNSTILE_SECRET_KEY` while deployed environments set `TURNSTILE_SECRET`, so verification was wrapped in a truthiness check on an always-null variable and the CAPTCHA response was validated as `nullable`. The widget rendered, so it looked healthy. Both names now resolve through `config/codeweek.php`.
- **`.env.example` shipped a real `APP_KEY`** plus live S3 bucket names, used the ignored `QUEUE_DRIVER` name instead of `QUEUE_CONNECTION`, and omitted about forty variables the application reads. Blanked, renamed, and filled in by name.
- **Committed debris deleted**: `cookies.txt` (a curl cookie jar with a live session cookie for meet-and-code.org), `texput.log`, `changed_files.txt`, `differences.diff`, `bom.json`, `phpunit.xml.bak`, `tailwind.js`, `server.php`, the LaTeX compile leftovers in `resources/latex/`, and the abandoned Travis configuration. `.gitignore` now covers the recurring ones.

### Correctness

- **Every ambassador saw only France** in the Nova `Country` resource, which was leftover debug code. Now scoped to the ambassador's own `country_iso`.
- **`Ambassador` filtered on `model_has_roles.role_id = 4`**, which only held while the seeders had run in their original order. Now matched by role name.
- **Rejecting from Nova told the organiser nothing.** The action called `reject()` with no argument, writing an empty moderation message and emailing a rejection with no reason, while the Blade screens at `/pending` and `/review` captured one. The action now has a required reason field.
- **The contact form fell back to the outgoing team's address** when `CONTACT_FORM_RECIPIENT_EMAIL` was unset. It now falls back to `ADMIN_EMAIL`.
- **Country was optional on the profile despite the form marking it required**, and the error block beneath it was bound to a field name that does not exist, so the validation message could never appear. Both fixed.
- **`certificate:preflight` defaulted to `--edition=2025`**, so a bare run silently checked the wrong year. Now defaults to the current year.
- **A scheduled command that did not exist**, `app:export-search-data-to-json`, failed nightly at 02:00. Removed.
- **`ResourceEditorRoleSeeder` threw on any re-run**, because it used `Permission::create` and `Role::create` for a role the main seeder already creates. Now idempotent.
- **Dead code deleted**: the two `nova-components/` packages that were never installed, `PromoteAmbassador`, the unattached `UserStatus` filter, the unrouted `ImporterController`, and the `/map` route whose only view include was a zero-byte file.

### Visibility and operations

- **Leading teachers with no city were invisible on `/community`** with nothing to tell them why. The community map groups teachers by `city_id` and skips any group whose city has no coordinates, so they were rendered nowhere at all. Their profile now warns them, and the leading-teachers admin list has a City column and a **Not set** filter so an admin can find and chase them. [14](14-accounts-and-moderation.md)
- **Nothing alerted on a backed-up queue.** `queue:monitor` was not scheduled and no listener for Laravel's `QueueBusy` event existed, so a stalled worker during October was noticed by a human wondering why activities were not appearing. `queue:monitor` now runs every five minutes against a configurable threshold, and `App\Listeners\AlertOnBusyQueue` logs and reports to Sentry. [10](10-scheduled-jobs-and-runbooks.md)
- **CI ran only for `master`**, so pull requests into `dev` ran no tests. Both branches now trigger.
- **The suite had two failing tests, one flake, and five files that never ran.** `CityFactory` was still in pre-Laravel-8 format, and `UserRestoreServiceTest` never disabled the `support_gmail.dry_run` guard that refuses writes. `OnlineEventsWorkflowTest` failed about one run in four because its fixture sat exactly on the query's fifteen-day boundary. The five files in `tests/Feature/` that lacked the `Test.php` suffix were repaired — they had drifted against the factory API — and renamed, so they now run. [11](11-testing-and-local-dev.md)

## Suggested order of work

1. **Set `CERTIFICATE_ADMIN_EMAILS`** in Forge for dev and live, and confirm you can reach the certificate backend. Nothing else about certificates matters until this is done.
2. **Close the credential actions.** Rotate the `forge` SSH keys, rotate `APP_KEY` where the committed one was used, and submit the contact form on dev to prove the Turnstile secret is valid.
3. **Verify the invisible parts.** Prove the scheduler runs, the workers are alive, a backup restores, and Sentry is receiving — you should now be able to trigger a queue alert deliberately. Export the Forge configuration while you have someone to ask.
4. **Decide the open questions.** Whether the public API stays unauthenticated, whether blog sync should prune, and whether to finish or remove the Azure login variables.

Then, before October: the readiness checklist in [10](10-scheduled-jobs-and-runbooks.md).
