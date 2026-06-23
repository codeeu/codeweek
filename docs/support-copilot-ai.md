# CodeWeek Support Copilot — AI capabilities (Phase 1)

**Status:** Phase 1 · AI triage + frontend code fixes as PRs into `dev`
**Phase 2 (planned):** AI-driven `artisan` changes on the server (allowlist-first, dry-run + APPROVE)

This builds on the email pipeline in [support-copilot-stakeholder-guide.md](./support-copilot-stakeholder-guide.md)
and the action matrix in [support-copilot-allowed-actions.md](./support-copilot-allowed-actions.md).

---

## What changed

| Before | Now (Phase 1) |
|--------|----------------|
| Deterministic keyword triage | **AI triage** via the Cursor headless CLI, with the keyword rules as automatic fallback |
| Only user data actions (`user_restore`, `user_profile_update`) | Adds **`code_change`**: a frontend/code fix implemented by a Cursor cloud agent as a **PR into `dev`** |
| — | Optional **dev → live release PR** opened for a human to merge (never auto-merged) |

The safety model is unchanged: in dry-run mode every write (including `code_change`)
sends a summary and only runs after an emailed **APPROVE** from an allowed domain.

---

## One key, two Cursor surfaces

A single `CURSOR_API_KEY` (a Cursor **service account** key is recommended) powers both:

| Surface | Used for | How |
|---------|----------|-----|
| Cursor **headless CLI** (`agent -p --output-format json`) | The triage "brain" | Runs on the Forge server |
| Cursor **Cloud Agents API** (`POST https://api.cursor.com/v1/agents`) | Code change + PR into `dev` | Runs in Cursor's cloud against the connected GitHub repo |

Prerequisites:

- Install the CLI on the server: `curl https://cursor.com/install -fsS | bash`
- Connect `github.com/codeeu/codeweek` to Cursor (Cloud Agents need GitHub access)
- Set the env vars below in Forge

---

## Flow

```mermaid
flowchart TD
    A[Ticket email] --> B[AI triage - Cursor CLI]
    B --> C{case_type}
    C -->|user data| D[user_restore / profile_update]
    C -->|code_change| E[Dry-run: exact agent prompt + target branch]
    E --> F[Summary email -> APPROVE]
    F -->|APPROVE| G[Cloud agent: branch + PR into dev]
    G --> H[poll-agents: capture PR link]
    H --> I[Report email: PR link]
    H -->|pr_only| J[Open/reuse dev -> live release PR]
```

1. **Triage** — the CLI returns a JSON classification. If AI is disabled or fails, the keyword rules run instead.
2. **Dry-run** — for `code_change` the summary email shows the **exact instruction** the agent will receive and the target branch (`dev`). Nothing runs yet.
3. **APPROVE** — reply `APPROVE` in-thread (same rules as all other actions).
4. **Execute** — a Cursor cloud agent makes the change on a `cursor/...` branch and opens a **PR into `dev`**.
5. **Report** — `support:ai:poll-agents` (scheduled every minute) captures the PR link and emails it, and — when `SUPPORT_AI_LIVE_PROMOTION=pr_only` — opens/reuses a **dev → live** release PR for a developer to merge.

**Nothing is ever merged or deployed automatically.**

---

## Configuration (`config/support_ai.php`)

| Env var | Default | Purpose |
|---------|---------|---------|
| `SUPPORT_AI_ENABLED` | `false` | Master switch for all AI features |
| `CURSOR_API_KEY` | — | Cursor service-account key (CLI + Cloud API) |
| `SUPPORT_AI_TRIAGE_ENABLED` | `true` | Use AI triage (falls back to keywords) |
| `SUPPORT_AI_CLI_BIN` | `agent` | Path to the Cursor CLI binary |
| `SUPPORT_AI_CLI_MODEL` | `gpt-5.4-mini-medium` | Model for triage (any id from `agent models`) |
| `SUPPORT_AI_CODE_CHANGE_ENABLED` | `false` | Enable the `code_change` action |
| `SUPPORT_AI_REPO_URL` | `https://github.com/codeeu/codeweek` | Repo for cloud agents |
| `SUPPORT_AI_DEV_BRANCH` | `dev` | PR target branch |
| `SUPPORT_AI_CLOUD_MODEL` | `composer-2.5` | Model for the cloud coding agent (verify via `GET /v1/models`) |
| `SUPPORT_AI_AUTO_CREATE_PR` | `true` | Agent opens the PR on completion |
| `SUPPORT_AI_MAX_POLL_MINUTES` | `30` | Give up polling an agent after N minutes |
| `SUPPORT_AI_LIVE_PROMOTION` | `pr_only` | `pr_only` opens dev→live PR; `none` disables |
| `SUPPORT_AI_LIVE_BRANCH` | `master` | Live branch (Forge auto-deploys this) |
| `SUPPORT_GITHUB_REPO` | `codeeu/codeweek` | owner/repo for the promotion PR |
| `SUPPORT_GITHUB_TOKEN` | — | Token to open the dev→live PR (skipped if absent) |

---

## Commands

| Command | Purpose |
|---------|---------|
| `php artisan support:ai:setup-check` | Verify the Cursor key, CLI binary path, model availability, DB columns, and GitHub token |
| `php artisan support:ai:poll-agents` | Check in-flight code-change agents, capture PR links, report, open dev→live PR (scheduled every minute when enabled) |
| `php artisan support:ai:promote-dev-to-live` | Manually open/reuse the dev → live release PR |

---

## Rollout checklist

0. Run `php artisan support:ai:setup-check` and fix any warnings before enabling.
1. `SUPPORT_AI_ENABLED=true`, set `CURSOR_API_KEY`, keep `SUPPORT_AI_CODE_CHANGE_ENABLED=false` → validate AI triage only.
2. Install Cursor CLI on the server; confirm `CURSOR_API_KEY=... agent -p --force "hello"` works (the `--force` flag skips the Workspace Trust prompt — the bot passes it automatically).
3. Connect the GitHub repo to Cursor, then `SUPPORT_AI_CODE_CHANGE_ENABLED=true` → first `code_change` ticket, verify the dry-run email shows the exact prompt.
4. APPROVE once; confirm a PR opens into `dev` and the report email arrives with the link.
5. Set `SUPPORT_GITHUB_TOKEN` to enable the dev→live release PR.

Keep `SUPPORT_GMAIL_DRY_RUN=true` throughout so every change still needs an emailed APPROVE.

---

## Phase 2 (not yet built) — AI `artisan` changes over SSH

Agreed design for the next phase:

- **Allowlist-first:** an `ArtisanActionRegistry` of permitted commands with validated args. The AI may only pick from these.
- **Fallback:** if no allowlisted command fits, the AI may propose a raw command string — still **dry-run first**, the **exact command** is emailed, and it only runs after **APPROVE**.
- **Report:** after execution, a completion email reports what ran and the result (reusing the existing completion-email pipeline).
