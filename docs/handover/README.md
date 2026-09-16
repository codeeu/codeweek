# Code Week technical handover

Technical documentation for the [codeweek.eu](https://codeweek.eu) platform, written for a developer taking over the system.

This set supersedes the three documents we received when we took the project over (`Codeweek - Setup Infra.docx`, `Certificates - Technical Documentation.docx`, `Certificate Generation Process Documentation`). Their content has been folded in, corrected where it had drifted from the code, and extended to cover everything built since.

## Ground rules for this folder

These files are **tracked in git in a public repository**. Follow the same rule as [docs/ops/README.md](../ops/README.md):

> Do not put secrets, credentials, or large binaries here.

Specifically:

- Environment variables are documented by **name and purpose only**. Never paste values.
- No server IP addresses, SSH targets, bucket names, database hostnames, Nova licence credentials, or API tokens. Use `<placeholder>` and point at the credentials vault.
- Private working files (spreadsheets, PDFs, sample exports) stay in `docs/internal/`, which is gitignored.

## Read in this order

| # | Chapter | What it covers |
|---|---------|----------------|
| — | [00-access-checklist.md](00-access-checklist.md) | Everything you need access to before you can do anything. Start here. |
| 01 | [01-architecture.md](01-architecture.md) | The stack, how the pieces fit, and a tour of the repository layout. |
| 02 | [02-environments-and-deployment.md](02-environments-and-deployment.md) | Forge hosting, the dev and live environments, branch model, CI, and how to deploy. |
| 03 | [03-configuration.md](03-configuration.md) | Every environment variable and config file, grouped by concern. |
| 04 | [04-domain-model.md](04-domain-model.md) | Activities, users, ambassadors, editions, taxonomies, and the database. |
| 05 | [05-nova-admin.md](05-nova-admin.md) | The Laravel Nova back office, who can access it, and the custom packages. |
| 06 | [06-bulk-uploads-and-imports.md](06-bulk-uploads-and-imports.md) | The bulk activity uploader, bulk user changes, and the resource importer. |
| 07 | [07-partner-feeds-and-apis.md](07-partner-feeds-and-apis.md) | National partner feeds, the Germany import, and our public API. |
| 08 | [08-certificates.md](08-certificates.md) | The LaTeX certificate pipeline and the annual rollover. |
| 09 | [09-wordpress-blog.md](09-wordpress-blog.md) | The WordPress blog and how it syncs into the Laravel site. |
| 10 | [10-scheduled-jobs-and-runbooks.md](10-scheduled-jobs-and-runbooks.md) | The cron schedule, the queue, and step-by-step runbooks. |
| 11 | [11-testing-and-local-dev.md](11-testing-and-local-dev.md) | Running the test suite and getting a local environment up. |
| 12 | [12-risks-and-known-issues.md](12-risks-and-known-issues.md) | What is still open, and behaviour with sharp edges. |
| 13 | [13-visual-tour.md](13-visual-tour.md) | Screenshots of every major screen, each mapped to the route and controller behind it. |
| 14 | [14-accounts-and-moderation.md](14-accounts-and-moderation.md) | Registration, profiles, roles, and who approves what. Includes the diagnosis for "why am I not on the community page?". |

## Single-file PDF

These chapters can be built into one printable document — roughly 134 pages, with a clickable table of contents, rendered diagrams, and the screenshot tour:

```bash
python3 docs/handover/_pdf/build.py
```

It writes `docs/handover/codeweek-technical-handover.pdf`. You need `pandoc` and Google Chrome installed, plus an internet connection at build time (the Mermaid renderer is loaded from a CDN).

The PDF is **deliberately not committed** — it is a 7.6 MB build artefact and this folder is meant to stay text. The markdown files are the source of truth. Regenerate the PDF when you need a copy to hand to someone.

## If you only read three pages

1. [00-access-checklist.md](00-access-checklist.md) — you will be blocked without this.
2. [02-environments-and-deployment.md](02-environments-and-deployment.md) — the single most misunderstood part of this repo. The Kubernetes manifests at the repo root are **local development only**; production runs on Laravel Forge.
3. [12-risks-and-known-issues.md](12-risks-and-known-issues.md) — the handful of things that still need your credentials, starting with `CERTIFICATE_ADMIN_EMAILS`, which locks you out of certificates until it is set.

## Ten-minute orientation

Code Week is a single Laravel 11 application (PHP 8.2+) that serves the public site, the activity map, the Learn & Teach resource catalogue, user accounts, certificates, and the administrative back office.

- **Front end** is a mix of server-rendered Blade views, Livewire 3 components, and Vue 3 islands built with Vite and Tailwind. It is not a single-page app.
- **Admin** is Laravel Nova 4 at `/nova`, plus a handful of bespoke Blade admin screens under `/admin/*` that predate or outgrew Nova.
- **Data** is MySQL 8. Redis is available for cache, session, and queue work.
- **Files** (activity images, avatars, generated certificate PDFs, resource PDFs) live in S3 across two buckets.
- **Certificates** are real PDFs produced by `pdflatex` from templates in `resources/latex/`. This is why the server needs a TeX Live installation.
- **Activities arrive three ways**: organisers register them on the site, admins bulk upload spreadsheets, and national partners feed them in over HTTP. See [06](06-bulk-uploads-and-imports.md) and [07](07-partner-feeds-and-apis.md).
- **The blog is a separate WordPress install** that is pulled into the Laravel database nightly over the WordPress REST API. See [09](09-wordpress-blog.md).

The busiest period by far is **October**, when Code Week runs. Traffic is roughly a quarter of the annual total in that one month, activity registrations spike, and certificate generation runs hot afterwards. Plan changes around it rather than through it.

## External references

- Repository: [github.com/codeeu/codeweek](https://github.com/codeeu/codeweek)
- Live site: [codeweek.eu](https://codeweek.eu)
- Dev site: [dev.codeweek.eu](https://dev.codeweek.eu/)
- Blog: [codeweek.eu/blog](https://codeweek.eu/blog/)
- Partner-facing import guide (public wiki): [Publish your events into Codeweek](https://github.com/codeeu/codeweek/wiki/Publish-your-events-into-Codeweek)
- Existing operational runbooks: [docs/ops/](../ops/)
- Public "getting help" note: [docs/getting-help-public.md](../getting-help-public.md)
