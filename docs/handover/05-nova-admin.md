# 05 — Nova admin

## Access

Nova is mounted at **`/nova`**, configured in [config/nova.php](../../config/nova.php). It uses the same `users` table and web guard as the public site, with its own authentication and password reset routes registered in [app/Providers/NovaServiceProvider.php](../../app/Providers/NovaServiceProvider.php).

Access is controlled by a single gate:

```97:99:app/Providers/NovaServiceProvider.php
        Gate::define('viewNova', function ($user) {
            return $user->hasRole('super admin') || $user->hasRole('ambassador') || $user->hasRole('resource editor');
        });
```

So three roles can get in: `super admin`, `ambassador`, and `resource editor`. There is no finer-grained gating at the gate level — restriction happens per resource, via `indexQuery` scoping and `authorizedToSee` checks.

The dashboard is at `/nova/dashboards/main`. The `EnsureNovaMainDashboard` middleware (registered in [bootstrap/app.php](../../bootstrap/app.php)) re-registers it on each request, and `NovaServiceProvider::boot()` also calls `Nova::dashboards()` directly. Both exist to work around the dashboard occasionally not being available. If you see duplicate-looking dashboard registration, that is why.

## Nova is not covered by CI

Worth stating plainly: CI replaces `composer.json` with `composer-test.json`, which strips the Nova packages. **No Nova code is exercised by the test suite.** Every Nova change must be QA'd by hand on dev. See [02](02-environments-and-deployment.md).

## Resources

48 resources in [app/Nova/](../../app/Nova). Note that `app/Nova/Resource.php` is not a resource — it is the abstract base class all the others extend, providing a default `indexQuery`.

Several newer resources are registered **explicitly** in `NovaServiceProvider::boot()` rather than relying on Nova's directory auto-discovery, because discovery was missing them from the sidebar:

```41:56:app/Providers/NovaServiceProvider.php
        Nova::resources([
            CsrCampaignPageNova::class,
            DancePageNova::class,
            GetInvolvedPageNova::class,
            GrassrootsGrantsPageNova::class,
            OnlineCoursesPageNova::class,
            TreasureHuntPageNova::class,
            TrainingResourceNova::class,
            MediaUploadNova::class,
            SupportCaseNova::class,
            SupportCaseActionNova::class,
            SupportApprovalNova::class,
            SupportCaseMessageNova::class,
            SupportGmailCursorNova::class,
            MenuSectionNova::class,
        ]);
```

**If you add a resource and it does not appear in the sidebar, add it to this array.** This is the single most likely cause of a "my new Nova resource is invisible" problem.

### Community

| Resource | Model | Notes |
|----------|-------|-------|
| `Event` | `App\Event` | The main activity admin. Status, geography, dates, certificate fields, the JSON format and age fields, and the audience/theme/tag relations. **Scoped for ambassadors** — see below |
| `User` | `App\User` | Deliberately minimal: avatar, name, email, password. No role fields are exposed, so **roles cannot be changed from here** |
| `Ambassador` | `App\User` | The ambassador toggle and country. Admin-only in the sidebar |
| `Country` | `App\Country` | Name, ISO, Facebook, website |

The `Event` resource scopes ambassadors to their own country:

```292:300:app/Nova/Event.php
    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->user()->hasRole('ambassador')) {
            return $query->where('country_iso', '=', $request->user()->country_iso);
        }

        return $query;

    }
```

### Resources (Learn & Teach)

| Resource | Purpose |
|----------|---------|
| `ResourceItem` | The resource records themselves, with all their taxonomy relations |
| `ResourceCategory`, `ResourceType`, `ResourceSubject`, `ResourceLevel`, `ResourceLanguage`, `ResourceProgrammingLanguage` | Filter taxonomies |
| `TrainingResource` | Dynamic training module pages, with locale overrides and hero fields |
| `OnlineCourse` | MOOC listings |
| `MediaUpload` | Uploaded media assets, with a bulk upload action |

### Content (editorial CMS)

A large part of the public site is editorially managed through these. Each corresponds to a page or a repeatable block on a page.

| Resource | Page |
|----------|------|
| `HomeSlide` | Homepage carousel, with locale override import/export |
| `StaticPage` | Registry of static content |
| `GetInvolvedPage` | Get Involved |
| `DreamJobsPage`, `DreamJobRoleModel`, `DreamJobsResource` | Careers in Digital |
| `GirlsInDigitalPage`, `GirlsInDigitalFaqItem` | Girls in Digital |
| `GrassrootsGrantsPage`, `GrassrootsGrantsHub`, `GrassrootsGrantsProject`, `GrassrootsGrantsProjectImage`, `GrassrootsGrantsProjectLink` | Grassroots Grants programme |
| `HackathonsPage` | Hackathons |
| `DancePage` | Dance Challenge |
| `TreasureHuntPage` | Treasure Hunt |
| `OnlineCoursesPage` | Online Courses landing |
| `CsrCampaignPage`, `CsrCampaignResource` | Future Ready CSR |
| `Partner` | Partners and sponsors |

Content fields on these pass through `stevebauman/purify` on save, so raw HTML from editors is sanitised. If an editor complains that their markup was stripped, check [config/purify.php](../../config/purify.php).

### Podcasts

`Podcast`, `PodcastGuest`, `PodcastResource`. The `Podcast` model implements `Feedable` and drives the outbound RSS feed at `/feed/podcasts`, configured in [config/feed.php](../../config/feed.php).

### Taxonomies

`Audience`, `Theme` (has an `order` field), `Tag`. Minimal UIs. Be careful here — see the warning about theme IDs in [04](04-domain-model.md).

### Site, matchmaking, and support

| Resource | Purpose |
|----------|---------|
| `MenuSection`, `MenuItem` | Editable site navigation |
| `MatchmakingProfile` | The matchmaking tool directory, with template download and bulk import actions |
| `SupportCase`, `SupportCaseMessage`, `SupportCaseAction`, `SupportApproval`, `SupportGmailCursor` | The AI support copilot subsystem |

## Actions

Ten actions in [app/Nova/Actions/](../../app/Nova/Actions).

| Action | Attached to | Effect |
|--------|-------------|--------|
| `ApproveEvent` | `Event` | Calls `$model->approve()` — sets status and emails the organiser |
| `RejectEvent` | `Event` | Calls `$model->reject($reason)` with a required reason — see below |
| `BulkUploadMediaFiles` | `MediaUpload` | Multi-file upload to S3 |
| `ExportHomeSlideLocaleOverrides` | `HomeSlide` | CSV export of slide translations |
| `ImportHomeSlideLocaleOverrides` | `HomeSlide` | CSV import of slide translations |
| `DownloadMatchmakingTemplate` | `MatchmakingProfile` | Downloads the import template |
| `ImportMatchmakingProfiles` | `MatchmakingProfile` | Bulk profile import |
| `ApproveSupportApproval` | `SupportApproval` | Support copilot workflow |
| `RejectSupportApproval` | `SupportApproval` | Support copilot workflow |
### Rejecting through Nova

`RejectEvent` used to expose no fields at all, so the `Moderation` record it wrote had an empty `message` and the organiser received a rejection email with no explanation, while the Blade screens at `/pending` and `/review` captured a reason. Ambassadors use both paths, so the two behaved differently for no reason anyone had chosen.

The action now requires a reason:

```33:39:app/Nova/Actions/RejectEvent.php
    public function fields(NovaRequest $request): array
    {
        return [
            Textarea::make('Rejection reason', 'rejectionText')
                ->rules('required', 'string', 'max:2000')
                ->help('Sent to the organiser in the rejection email and stored on the activity.'),
        ];
```

One difference remains, and it is not fixable in the action: **editing the Status field directly on the Event resource bypasses `approve()` and `reject()` entirely**, so no email is sent and no moderation record is written. Use the actions, not the dropdown. [14](14-accounts-and-moderation.md)

## Filters

| Filter | Applied to | Options |
|--------|------------|---------|
| `EventStatus` | `Event` | APPROVED, PENDING, REJECTED |
| `EventCountry` | `Event` | Countries that have activities. Admin only |
| `UserCountry` | `Ambassador` | Countries that have activities |
| `ResourceActive` | `ResourceItem` | Published / Pending |
## Metrics and dashboard

One dashboard, `app/Nova/Dashboards/Main.php`, with five cards:

| Metric | Measures |
|--------|----------|
| `EventCount` | Total activities, over 30 / 60 / 365 day ranges |
| `EventsPerDay` | Activity creation trend |
| `UsersPerDay` | Registration trend |
| `ImporterTrend` | Daily count of feed-imported activities |
| `MeetCodeTrend` | Daily count of Meet and Code RSS items |

There are **no lenses** anywhere in the Nova layer — every resource returns an empty `lenses()` array. If you need a saved, filtered view, a lens is the idiomatic way to add one.

## Nova runs stock

There is no custom theme and no analytics tool. The repository used to contain a `nova-components/` directory holding two local packages — `codeeu/nova-theme` and `acme/analytics` — that were never installed: no `path` repository in `composer.json`, absent from `composer.lock`, and neither service provider referenced outside its own directory. `Analytics` also had its component registration commented out, so it would have built an empty bundle. Both directories and the `npm run build-analytics*` scripts have been deleted, because they read as working features and were not.

If you want a custom Nova theme or a dashboard tool, start fresh with the current Nova documentation rather than reviving those.

## Two ambassador-scoping bugs, now fixed

Both are worth knowing about because they shaped what ambassadors saw for a long time, and because the pattern can recur.

`Country::indexQuery` scoped **every** ambassador to France, regardless of their own country — leftover debug code. It now uses the ambassador's `country_iso`, and returns a query rather than `null` on the fall-through path:

```100:106:app/Nova/Country.php
        if ($request->user()->isAmbassador()) {
            return $query
                ->where('iso', '=', $request->user()->country_iso);
        }

        return $query;
    }
```

`Ambassador::indexQuery` filtered on `model_has_roles.role_id = 4`, which only held while the seeders had run in their original order. It now matches by role name:

```114:118:app/Nova/Ambassador.php
        // Matched by role name, not id: the previous `role_id = 4` only held while
        // the seeders had run in their original order.
        return $query->whereHas('roles', function ($roles) {
            $roles->where('name', 'ambassador');
        });
```

**Never filter on a role or permission ID in this codebase.** IDs depend on seeder ordering; names do not.

### `User` resource search is broken

The `User` resource searches a `name` column. The `users` table has `firstname` and `lastname`, not `name`. Searching users in Nova therefore does not work as expected.

## The other admin: bespoke Blade screens

Not everything admin-related is in Nova. A significant set of screens live in `routes/web.php` under `/admin/*` and elsewhere, gated by role middleware:

| Area | Route | Gate |
|------|-------|------|
| Bulk activity upload | `/admin/bulk-upload` | `role:super admin` |
| Bulk user changes | `/admin/bulk-user-changes` | `role:super admin` |
| Resource import | `/admin/resources-import` | `role:super admin` |
| Activity moderation queue | `/pending`, `/review` | `role:super admin\|ambassador` |
| Excellence winners and certificate batches | various | `role:super admin` |
| Certificate backend | `/admin/certificate-backend/*` | **Single hardcoded email** |

The rule of thumb: **Nova for CRUD and content, Blade admin screens for anything involving a workflow, a file upload, or a batch job.** The bulk uploaders are covered in [06](06-bulk-uploads-and-imports.md), certificates in [08](08-certificates.md).
