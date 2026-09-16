# 11 — Testing and local development

## Running the tests

```bash
php artisan test              # everything
php artisan test --parallel   # what CI runs
php artisan test --filter=BulkEventUploadCacheTest
php artisan test tests/Feature/CertificatesTest.php
vendor/bin/phpunit            # equivalent, via PHPUnit directly
```

## Test configuration

[phpunit.xml](../../phpunit.xml) defines two suites, `Unit` and `Feature`, both matching files with a `Test.php` suffix.

The environment it sets up:

| Variable | Value | Effect |
|----------|-------|--------|
| `APP_ENV` | `testing` | |
| `APP_URL` | `http://codeweek.test` | |
| `DB_CONNECTION` | `sqlite` | |
| `DB_DATABASE` | `:memory:` | Fast, and nothing to clean up |
| `CACHE_STORE`, `SESSION_DRIVER` | `array` | In-memory |
| `MAIL_MAILER` | `array` | No mail leaves the process |
| `QUEUE_CONNECTION` | `sync` | Jobs run inline |
| `BCRYPT_ROUNDS` | `4` | Fast password hashing |

Coverage is scoped to `./app`.

**Tests run against SQLite, production runs MySQL 8.** That gap matters for the parts of this codebase that use MySQL-specific SQL — `JSON_CONTAINS` for the `activity_format` and `ages` filters, and `FIND_IN_SET` for the language filter, both in `app/Filters/EventFilters.php`. Those paths cannot be meaningfully covered by the SQLite suite. A `mysql_testing` connection exists in `config/database.php` and there is a commented-out line in `phpunit.xml` to use it:

```18:18:phpunit.xml
    <!--        <env name="DB_CONNECTION" value="mysql_testing"/>-->
```

If you are changing the filter layer, switch to it locally and run the suite against MySQL before shipping.

## Test layout

111 test files.

| Location | Contents |
|----------|----------|
| `tests/Unit/` | Bulk upload cache and duplicate finder, bulk user changes services, social login, user email change, avatar URL, factory behaviour |
| `tests/Feature/` | The bulk of the suite — activity CRUD and approval, certificates, excellence, Code Week 4 All, ambassadors, leading teachers, imports, locations, countries, GDPR deletion |
| `tests/Feature/API/` | The public events API |
| `tests/Feature/Auth/` | Password validation |
| `tests/Feature/Achievements/` | Nine files covering badges, experience, and influence |
| `tests/Feature/InternalSupport/` | Support copilot auth and pipeline |
| `tests/utilities/functions.php` | Shared test helpers |
| `tests/DuskTestCase.php` | Dusk base class. **There are no Dusk tests** — the scaffolding exists but is unused |

### `tests/TestCase.php`

Every test inherits setup that is worth knowing about, because it changes what you are actually testing:

```10:18:tests/TestCase.php
    protected function setUp(): void
    {
        parent::setUp();
        //$this->withoutExceptionHandling();
        $this->mockLocale();
        $this->mockBrowserCheck();
        $this->withoutVite();
        Mail::fake();
    }
```

- The `Locale` and `CheckBrowser` middleware are **mocked out**, so neither is exercised by the suite.
- `withoutVite()` skips asset manifest resolution, so tests do not need a build.
- `Mail::fake()` is global — assert with `Mail::assertQueued()` rather than expecting real delivery.
- A `signIn($user)` helper creates and authenticates a user in one call.

### Two factory systems, side by side

`database/factories/` contains **both** styles of Laravel factory, and which one you can use depends on the model:

- **Modern class factories** (`class CountryFactory extends Factory`, resolved by `Model::factory()`). Seventeen models use these.
- **Legacy closure factories** (`$factory->define(App\Podcast::class, ...)`), which only work because `laravel/legacy-factories` is still installed. These are reached through the global `factory()` helper, or the `create()` and `make()` wrappers in `tests/utilities/functions.php`. Fourteen models still use these.

So `Podcast::factory()` fails with *"Class Database\Factories\PodcastFactory not found"*, while `create(\App\Country::class)` fails with *"Unable to locate factory for [App\Country]"*. Check which style a model has before writing a test against it, and if you convert one, convert its call sites in the same commit.

`City` was converted from legacy to modern as part of this handover, because a community test needed `City::factory()`. Converting the remaining fourteen would be a reasonable tidy-up, but do it one model at a time and update the `create(...)` call sites with it.

### Five files that used to be skipped

`GermanImports`, `GermanUsersCreation`, `RelocateCenteredActivities`, `RelocateOnlineActivities` and `NullEmails` were in `tests/Feature/` without the `Test.php` suffix, so PHPUnit ignored them. They have been repaired and renamed, and now run.

What they had drifted against is worth knowing, because the same drift is waiting in any old test you revive:

- `->create([...], 6)` used to mean "make six". The modern API is `->count(6)->create([...])`, and passing an integer as the second argument now throws a `TypeError` about `$parent`.
- Two of them called `User::factory()` without importing `App\User`, which fails as `Class "Tests\Feature\User" not found`.
- `GermanImports` asserted that `cw22-leipzig`, `cw22-dresden` and `cw22-thueringen` count as imported, but those cities are no longer in `ImporterHelper::getGermanCities()`. Rather than add them back and change what `Event::imported()` matches, the test now iterates that helper, so the list stays the single source of truth.

The lesson for the other thirteen legacy factories and anything else you exhume: a test that has not run for years is asserting the contract of a codebase that no longer exists. Read what it claims before you trust a green tick.

### One flake, and why it mattered

`OnlineEventsWorkflowTest` failed roughly one run in four, which is the worst possible failure rate — often enough to erode trust in the suite, rarely enough that re-running makes it go away.

The cause is worth internalising because the pattern is everywhere in this codebase. `OnlineEventsQuery` selects activities with `start_date >= Carbon::now()->subDays(15)`, and the test created its fixture at **exactly** `Carbon::now()->subDays(15)`. The two `now()` calls happen milliseconds apart, so whenever the clock ticked a second between them the fixture fell a second outside its own window.

Several queries use this fifteen-day window — `OnlineEventsQuery`, `CountriesQuery::withOnlineEvents()` and `EventHelper::getOnlineEvents()`. If you write a test against any of them, **put the fixture a day inside the boundary, not on it.** If you genuinely need to test the boundary, freeze time with `Carbon::setTestNow()` rather than relying on two clock reads agreeing.

## What the suite does not cover

Be realistic about this before relying on a green run:

| Area | Status |
|------|--------|
| Nova | **Not covered at all.** CI swaps in `composer-test.json`, which strips Nova ([02](02-environments-and-deployment.md)) |
| Certificate PDF generation | Not covered end to end — it needs a TeX installation |
| MySQL-specific query paths | Not covered, per the SQLite note above |
| Browser behaviour | No Dusk tests, despite the base class |
| The Vue front end | No JavaScript test setup at all |
| Locale and browser middleware | Mocked out in `TestCase` |

A green suite means the core domain logic is intact. It does not mean the admin, the certificates, or the front end work.

## Local development

Two options. Neither is mandated.

### Option A: standard local PHP

Conventional and probably faster to get going if you already have PHP 8.2+, MySQL 8, Redis, and Node 20+.

```bash
git clone git@github.com:codeeu/codeweek.git
cd codeweek

# Nova credentials are required for composer install
composer config http-basic.nova.laravel.com <nova-username> <nova-password>
composer install

cp .env.example .env
php artisan key:generate
```

Then fill in `.env` properly. `.env.example` now lists the variables the application actually reads, grouped by concern, with empty values — but it is a template, not a working configuration. Run `php artisan key:generate`, and use [03](03-configuration.md) plus the server `.env` as the reference for anything that needs a real value.

```bash
php artisan migrate:fresh --seed
npm install
npm run dev        # Vite dev server with hot reload
php artisan serve
```

Seeding gives you countries, cities, roles, a super admin, 60 ambassadors, taxonomies, sample activities, resources, and CMS content.

For certificate work you also need TeX Live and a correct `PDFLATEX_PATH` ([08](08-certificates.md)). Without it everything else still works; only certificates fail.

### Option B: DevSpace on Kubernetes

Avoids installing PHP, MySQL, Redis, and Node locally. Setup is in [02](02-environments-and-deployment.md) and [devspace/README.md](../../devspace/README.md).

```bash
kubectl create ns codeweek
kubectl create secret generic certificates-secret \
  --from-file=tls.crt=./localhost.crt --from-file=tls.key=./localhost.key
# add "127.0.0.1  codeweek.local.europa.eu" to /etc/hosts
cp devspace/.env.devspace .env
devspace dev
devspace run artisan migrate:fresh --seed
```

Then `https://codeweek.local.europa.eu`.

**Known blocker:** `devspace.yaml` pins a PHP **8.0** FPM image while the application requires 8.2+. You will need to point `APP_IMAGE` at a newer image before this path works.

## Asset build

| Command | Purpose |
|---------|---------|
| `npm run dev` | Vite dev server with hot module reload |
| `npm run build` | Production build. Runs on deploy |
| `npm run build-analytics` | Builds the Nova Analytics package in dev mode |
| `npm run build-analytics-prod` | Production build of the same |

The analytics scripts are vestigial — that package is **not installed** and its component registration is commented out. See [05](05-nova-admin.md).

Three Vite entry points: `resources/js/app.js`, `resources/css/app.css` (Tailwind), and `resources/assets/sass/app.scss` (legacy SCSS). Both stylesheets are live; check which one governs the page you are editing before adding classes ([01](01-architecture.md)).

## Translations and locales

### Where translations live

`resources/lang/` has one directory per language, each containing PHP array files split by area: `base.php`, `auth.php`, `about.php`, `ambassador.php`, `certificates.php`, `challenges.php`, `codeweek4all.php`, and others.

30 directories exist. `LOCALES` exposes 27. The three translated but **not exposed** in the language switcher are `mt` (Maltese), `tr` (Turkish), and `ua` (Ukrainian). If someone asks why a language they translated is not appearing, that variable is the answer ([03](03-configuration.md)).

### Two translation systems

Blade views use Laravel's `__()` and `trans()` directly.

Vue components use `laravel-vue-i18n`, wired through the Vite plugin in [vite.config.js](../../vite.config.js), which reads `resources/lang` at build time. **So adding a translation key used by a Vue component requires rebuilding assets**, not just editing the file.

There is also an older generator, `php artisan vue-i18n:generate` (`martinlindhe/laravel-vue-i18n-generator`, from a [codeeu fork](https://github.com/codeeu/laravel-vue-i18n-generator)), configured in [config/vue-i18n-generator.php](../../config/vue-i18n-generator.php). It predates the Vite plugin approach. Check which mechanism the component you are working on actually uses before running it.

### Adding a language

1. Create `resources/lang/{code}/` and populate it, using `en` as the reference.
2. Add the code to `LOCALES` in the environment.
3. Rebuild assets so the Vue side picks it up.
4. For certificates, the script may need a **dedicated LaTeX template** — Greek, Ukrainian, and multi-language variants exist for exactly this reason ([08](08-certificates.md)).

## Code style

There is no enforced formatter or linter in CI. Laravel Pint is available through the framework's dependencies but is not run automatically.

Match the surrounding file. Be aware that the codebase has two distinct eras: older code in `app/Console/Commands/` and the top-level models is looser, while newer code in `app/Services/` is typed, small, and closer to modern Laravel conventions. Follow the latter for new work.
