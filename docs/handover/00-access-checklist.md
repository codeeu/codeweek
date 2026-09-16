# 00 — Access checklist

Work through this before anything else. Most of the platform cannot be operated read-only, and several areas will actively refuse you until the outgoing team hands over or changes a setting.

**No credential values appear in this folder.** Each row below names *what* you need and *where it is held*. The values come from the credentials vault during handover.

## 1. Source control and project

| What | Why you need it | Notes |
|------|-----------------|-------|
| GitHub access to [codeeu/codeweek](https://github.com/codeeu/codeweek) | All application code | Push rights plus permission to merge to `dev` and `master` |
| GitHub wiki edit rights | The [partner import guide](https://github.com/codeeu/codeweek/wiki/Publish-your-events-into-Codeweek) is the contract national partners work from | Must be kept in sync with the validator; see [06](06-bulk-uploads-and-imports.md) |
| Branch protection / review settings | To understand what can reach live | Confirm who can approve to `master` |

## 2. Hosting and servers

Production and staging run on **Laravel Forge** over AWS EC2. See [02](02-environments-and-deployment.md).

| What | Why you need it |
|------|-----------------|
| Laravel Forge account on the team/circle that owns both sites | Deploys, queue workers, scheduler, SSL, server `.env` editing |
| AWS account access | EC2 instances, S3 buckets, IAM |
| SSH key added to the `forge` user on both servers | Running Artisan commands, imports, log inspection |
| The dev and live server addresses | Held in the vault, not in this repo. See the note in section 9. |
| DNS / registrar access for `codeweek.eu` | Certificates, subdomains, mail records |

The server `.env` files, the `schedule:run` cron entry, and the queue worker definitions exist **only in Forge**. Nothing in this repository will recreate them. Export or screenshot them during handover.

## 3. Database

| What | Why |
|------|-----|
| MySQL credentials for dev and live | Held in the server `.env` and in Forge |
| A recent verified restore of a live backup | Do not take backups on trust — restore one and check row counts before you change anything |
| Backup schedule and retention details | Confirm what is actually running and where it lands |

## 4. Object storage (S3)

Two separate buckets are used. Names and credentials are in the vault and the server `.env`.

| Disk name in code | Holds |
|-------------------|-------|
| `s3` | Activity images, user avatars, generated certificate PDFs |
| `resources` | Learn & Teach resource PDFs and thumbnails |

You need the AWS access key pair, region, and both bucket names. See [03](03-configuration.md) for the variable names.

## 5. Laravel Nova licence

Nova is a paid Laravel product. `composer install` will fail without it.

| What | Where it is used |
|------|------------------|
| Nova licence username and password | `auth.json` locally, Forge deploy environment, and the `NOVA_USERNAME` / `NOVA_PASSWORD` GitHub Actions secrets |

`auth.json` is gitignored, so it will not arrive with the clone — you must create it locally or run `composer config http-basic.nova.laravel.com <username> <password>`. Confirm the licence itself is transferred to the incoming organisation, not just the credentials.

## 6. Third-party services

| Service | Used for | Credential type |
|---------|----------|-----------------|
| Sentry | Error monitoring | DSN |
| Mapbox | Map tiles on the activity and community maps | Access token |
| Cloudflare Turnstile | Bot protection on the contact form | Site key and secret |
| Mail transport (SMTP, Mailgun-compatible) | All transactional email and mailings | Host, username, password, from-address |
| Google Cloud project | OAuth login and the support mailbox integration | OAuth client, plus a Gmail OAuth token |
| Facebook, X, GitHub developer apps | Social login | OAuth client and secret per provider |
| IP geolocation provider | Default country on the map page | API key |
| Matomo | Web analytics | Dashboard login |
| Site24x7 | Uptime monitoring | Dashboard login |
| CookieScript | Cookie consent banner | Account ID |
| Cursor | The AI support copilot subsystem, if you keep it running | API key and a GitHub token |

Azure OAuth variables also exist in the deployed environment but are **not** wired into the login flow. See [12](12-risks-and-known-issues.md).

## 7. WordPress blog

The blog at [codeweek.eu/blog](https://codeweek.eu/blog/) is a separate application on the live server. See [09](09-wordpress-blog.md).

| What | Why |
|------|-----|
| WordPress admin login | Content publishing, plugin and core updates |
| Filesystem access to the blog directory on the live server | The theme is patched with shell scripts in [scripts/](../../scripts) |
| Theme source or a backup of it | The active theme has been hand-patched; changes are not in this repo |

## 8. Application-level access

You will need an account on both dev and live with the right roles. Roles are managed with spatie/laravel-permission; see [04](04-domain-model.md).

| Role | Grants |
|------|--------|
| `super admin` | Everything, including Nova, the bulk uploaders, and the admin screens |
| `ambassador` | Nova access scoped to their own country, plus activity moderation |
| `resource editor` | Nova access for the resource catalogue |

Ask for a `super admin` account on both environments.

### Day-one blocker you must resolve

The certificate administration area at `/admin/certificate-backend/*` is not governed by roles at all. It reads an explicit allowlist of email addresses from the environment, and it **fails closed**:

```19:23:app/Http/Middleware/EnsureSuperCertificateAdmin.php
        if (empty($allowed)) {
            Log::warning('Certificate backend access denied: CERTIFICATE_ADMIN_EMAILS is not set.');

            abort(403, 'The certificate administrator list is not configured. Set CERTIFICATE_ADMIN_EMAILS.');
        }
```

So until somebody sets `CERTIFICATE_ADMIN_EMAILS` in Forge, **nobody can operate certificates** — not even a super admin. Add your own address to it on both environments as part of getting set up, and confirm you can load `/admin/certificate-backend`. This used to be a single hardcoded address belonging to the outgoing team; see [12](12-risks-and-known-issues.md).

## 9. A note on server addresses in git history

The runbook at [docs/ops/learn-and-teach-resource-import.md](../ops/learn-and-teach-resource-import.md) previously contained the live and dev server IP addresses together with working `ssh` command lines, committed to this **public** repository. Those have been replaced with placeholders.

Redacting the file does not remove the addresses from git history. If these are considered sensitive, the real mitigation is one of:

- rotating the `forge` SSH keys on both servers, and/or
- restricting SSH ingress at the AWS security group to known addresses.

Treat this as an action item for the incoming team rather than something already solved.

## 10. Handover verification

Before you consider the handover complete, prove each of these yourself:

- [ ] Clone the repo and get `composer install` to complete, including Nova.
- [ ] Bring up a local environment and load the homepage ([11](11-testing-and-local-dev.md)).
- [ ] Run the test suite green.
- [ ] Log into Nova on dev as a super admin.
- [ ] Deploy a trivial change to dev and see it live ([02](02-environments-and-deployment.md)).
- [ ] Restore a live database backup into a scratch environment and compare row counts.
- [ ] Generate one certificate end to end on dev, confirming `pdflatex` works and the PDF reaches S3 ([08](08-certificates.md)).
- [ ] Run a small bulk activity upload on dev through to the report screen ([06](06-bulk-uploads-and-imports.md)).
- [ ] Confirm the scheduler is running on live and the queue has a worker.
- [ ] Log into the WordPress blog admin and confirm `app:sync-blogs` pulls a new post through.
