# CodeWeek Support Copilot — Allowed actions reference

**Version:** V1 · **Last updated:** May 2026

This document lists everything the support copilot **allows**, **automates**, and **blocks**.

---

## 1. Who can send tickets (ingest)

| Rule | Allowed |
|------|---------|
| Sender email domain | `@matrixinternet.ie`, `@codeweek.eu` (config: `SUPPORT_GMAIL_ALLOWED_DOMAINS`) |
| Extra explicit senders | Optional list via `SUPPORT_GMAIL_ALLOWED_SENDERS` |
| Subject line (new tickets) | Must contain `codeweek-support` (config: `SUPPORT_GMAIL_SUBJECT_PREFIX`) |
| Subject line (APPROVE replies) | Must be in the **`[CW-SUPPORT #…]`** thread (poll also searches this prefix) |
| Teacher / parent Gmail, schools, etc. | **Not ingested** — staff must send a new email from an allowed domain |

---

## 2. Who can approve writes (email reply)

| Rule | Allowed |
|------|---------|
| Reply keywords (first line only) | `APPROVE`, `YES`, `PROCEED` (case-insensitive) |
| Sender domain | Same as ingest: `@matrixinternet.ie`, `@codeweek.eu` |
| Thread | Reply in the same Gmail thread as the `[CW-SUPPORT #…]` summary when possible |

---

## 3. Automated write actions (require APPROVE when `SUPPORT_GMAIL_DRY_RUN=true`)

These are the **only** actions that can change production data via the email pipeline after **APPROVE**:

| Action ID | Case type | What it does | Required in ticket |
|-----------|-----------|--------------|-------------------|
| `user_restore` | `account_restore` | Restores a **soft-deleted** user | User email + words like *restore*, *deleted account* |
| `user_profile_update` | `profile_update` | Updates `firstname` and/or `lastname` on `users` | User email + requested first/last name |
| `code_change` | `code_change` | AI cloud agent implements a frontend/code fix and opens a **PR into `dev`** (never deploys) | Description of the bug/change in the website code |
| `artisan_command` | `artisan_command` | Runs an allowlisted (or guarded AI-proposed) `artisan` maintenance command on the server after dry-run + APPROVE | Request needing a server maintenance command; gated by `SUPPORT_AI_ARTISAN_ENABLED` |
| `content_update` | `content_update` | Edits **text fields only** on allowlisted Nova-managed content records (pages, slides, FAQs, …) after dry-run + APPROVE; never touches URLs/flags/relations | Request to fix/reword copy on an existing page or record; gated by `SUPPORT_AI_CONTENT_ENABLED` |

Configured in `config/support_gmail.php` → `allowed_write_actions`. AI features are
configured in `config/support_ai.php` — see [support-copilot-ai.md](./support-copilot-ai.md).

---

## 4. Case types (triage classification)

| Case type | Trigger keywords (examples) | Automated write? |
|-----------|----------------------------|----------------|
| `account_restore` | soft-deleted, deleted, restore account | Yes → `user_restore` + APPROVE |
| `profile_update` | update profile, first name, last name, change name | Yes → `user_profile_update` + APPROVE |
| `certificate_issue` | certificate, cert | **No** — summary / manual reply |
| `missing_events` | missing event, events missing | **No** |
| `duplicate_account` | duplicate, two accounts | **No** |
| `role_issue` | role, permission | **No** |
| `unknown` | (none matched) | **No** |

---

## 5. Read-only / manual tools (no email APPROVE)

| Tool | CLI | Internal API | Email APPROVE |
|------|-----|--------------|---------------|
| User audit | — | `POST /tools/user-audit` | No |
| Event audit | `support:event-audit` (if registered) | `POST /tools/event-audit` | No |
| Email change | `support:user-update-email {from} {to}` | — | **No** (CLI / dev only) |
| Profile name change | `support:user-update-profile {email} --firstname= --lastname=` | `POST /tools/user-profile-update` | Yes (via pipeline + APPROVE) |
| Gmail test | `support:gmail:test` | — | N/A |
| Gmail poll | `support:gmail:poll` | — | N/A |

---

## 6. Profile update — allowed fields

| Field | Column | Allowed via copilot? |
|-------|--------|----------------------|
| First name | `users.firstname` | **Yes** |
| Last name | `users.lastname` | **Yes** |
| Email | `users.email` | **No** (use `support:user-update-email`) |
| Display email | `users.email_display` | **No** |
| Twitter, website, bio, tag, country | various | **No** (user edits in UI or manual) |
| Delete / restore account | soft delete | Restore only via `user_restore` |

**Rejected as names:** placeholder text such as `Last Name`, `First Name`, `Your details`, empty strings.

---

## 7. Safety flags (environment)

| Variable | Typical prod | Effect |
|----------|--------------|--------|
| `SUPPORT_GMAIL_ENABLED` | `true` | Turns on polling |
| `SUPPORT_GMAIL_POLL_INTERVAL_MINUTES` | `1` | Scheduler frequency (1–5 typical; increase if Gmail rate limits) |
| `SUPPORT_GMAIL_DRY_RUN` | `true` | Pipeline sends summaries; writes need **APPROVE** |
| `SUPPORT_GMAIL_NOTIFY_EMAIL` | `codeweek@matrixinternet.ie` | Dry-run summary recipient |
| `SUPPORT_GMAIL_ALLOWED_DOMAINS` | `matrixinternet.ie,codeweek.eu` | Ingest + approve senders |

---

## 8. Gmail API scopes

| Scope | Purpose |
|-------|---------|
| `gmail.readonly` | Poll inbox, read approval replies |
| `gmail.send` | Send dry-run summaries and completion emails |

---

## 10. Email notifications (what you receive)

| When | Email subject (example) |
|------|-------------------------|
| Ticket processed (dry-run) | `[CW-SUPPORT #10] Support copilot - dry run review` |
| After you reply **APPROVE** and action runs | `[CW-SUPPORT #10] Support copilot - action completed` or `action failed` |

Completion emails go to the same recipient as the dry-run summary (`SUPPORT_GMAIL_NOTIFY_EMAIL` unless overridden). Disable with `SUPPORT_GMAIL_SEND_COMPLETION_EMAIL=false`.

---

## 9. Not allowed / out of scope (V1)

- Ingest mail without `codeweek-support` in subject
- Approve from non-allowlisted domains
- Auto-change email via support email (CLI only)
- Auto-issue or regenerate Excellence certificates from email
- Auto-merge duplicate accounts
- Auto-change roles/permissions
- LLM-only decisions without DB checks (not implemented)

---

## 10. Quick test commands (technical)

```bash
# Profile update dry-run
php artisan support:user-update-profile bernard@matrixinternet.ie --firstname=Bernard --lastname=Hanna --dry-run

# Profile update live (bypasses email; use on server with care)
php artisan support:user-update-profile bernard@matrixinternet.ie --firstname=Bernard --lastname=Hanna

# Simulated pipeline + summary email
php artisan support:gmail:test

# Check config
php artisan support:gmail:setup-check
```

---

See also:

- [support-copilot-stakeholder-guide.md](./support-copilot-stakeholder-guide.md)
- [support-copilot-ai.md](./support-copilot-ai.md) — AI triage + frontend code PRs (Phase 1)
