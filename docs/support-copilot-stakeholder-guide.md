# CodeWeek Support Copilot — Stakeholder guide

**Version:** V1 (dry-run) · **Last updated:** May 2026

---

## What this is

CodeWeek has an automated **support assistant** that:

- Watches a dedicated support inbox
- Picks up qualifying emails automatically (about every minute by default)
- Runs basic checks on the user account mentioned in the email
- Sends a **summary email** to **codeweek@matrixinternet.ie** so the team can review before any change is made

**Nothing is changed automatically** unless the summary explicitly asks for approval and someone approves by email.

---

## Who should use this

Anyone at **Matrix Internet** or **CodeWeek** (`@matrixinternet.ie` or `@codeweek.eu`) who needs help with a CodeWeek user account (login issues, deleted account, etc.).

---

## How to log a support request (3 steps)

### Step 1 — Send an email to the support inbox

**To:** `________________________`

*(Fill in: the Gmail inbox connected to the copilot — ask your technical contact if unsure.)*

### Step 2 — Use the correct subject line

The subject **must include**:

```text
codeweek-support
```

**Good examples:**

- `codeweek-support — user cannot log in`
- `codeweek-support — restore account for parent@example.com`

**Bad examples (will not be processed):**

- `User cannot log in` *(missing codeweek-support)*
- `Fwd: RE: login issue` *(forward only — send a new email with the prefix)*

### Step 3 — Write a clear message

Include:

1. **The user’s email address** on CodeWeek (required)
2. **What the problem is** in plain language
3. **What you want done** (e.g. “check if account is deleted and restore if possible”)

**Example email:**

```text
To: [support inbox]
From: colleague@matrixinternet.ie
Subject: codeweek-support — account restore request

Hello,

Please investigate user: serin34@yahoo.com

They cannot log in. The account may have been soft-deleted.
Please check and restore if appropriate.

Thanks,
[Name]
```

**Rules:**

| Requirement | Detail |
|-------------|--------|
| **Send from** | `@matrixinternet.ie` or `@codeweek.eu` only |
| **Subject** | Must contain `codeweek-support` |
| **Body** | Must include the affected user’s email address |

Emails from other domains (Gmail, Yahoo, schools, etc.) are **not processed**, even if forwarded.

---

## Typical support tickets (examples)

These are real-world requests the copilot is designed for. **Staff must not forward the teacher’s email as-is** — copy the facts into a new email from `@matrixinternet.ie` or `@codeweek.eu` with `codeweek-support` in the subject.

---

### Example 1 — Teacher accidentally deleted account (restore)

**Situation (incoming request to the team)**

A colleague or EU CodeWeek coordinator receives a message like this:

```text
Hi Bernard,

The teacher below has accidentally deleted her account and asks to be recovered.

Registration email: laurafuso1@gmail.com
CodeWeek 4all code: cw25-x6LtQ

Thank you,
Regards,
Rachele
```

The public-facing team may already have replied (e.g. asking for email and activity codes). Once you have those details, **log the ticket for the copilot** as below.

**What to send to the support copilot**

```text
To: [support inbox]
From: rachele@matrixinternet.ie
Subject: codeweek-support — restore deleted teacher account

Hello,

Request type: restore deleted account

User registration email: laurafuso1@gmail.com
CodeWeek 4all code: cw25-x6LtQ

The teacher accidentally deleted her account and needs it recovered.
Please check if the account is soft-deleted and restore if appropriate.

Reported by: Rachele (EU CodeWeek coordination)
```

**Why this wording matters**

| Detail in the ticket | Purpose |
|----------------------|---------|
| `codeweek-support` in subject | Required so the inbox is polled |
| `restore` / `deleted account` | Helps triage classify as **account restore** |
| `laurafuso1@gmail.com` | Target user for diagnostics |
| `cw25-x6LtQ` | Extra context for manual verification (V1 may not auto-use the code yet) |
| Work email sender | Required for ingest and for any later **APPROVE** reply |

**What the team receives (~1 minute later)**

An email to **codeweek@matrixinternet.ie** similar to:

```text
[CW-SUPPORT #…] Support copilot - dry run review

Case #…
Subject: codeweek-support — restore deleted teacher account
Type: account_restore
Risk: low
Target: laurafuso1@gmail.com

Diagnostics findings: …

Proposed action: user_restore
To execute this change, reply to this email with a single line:
APPROVE
```

If diagnostics show the user is soft-deleted and restore is safe, a reviewer replies **APPROVE** (from `@matrixinternet.ie` or `@codeweek.eu`) in the **same thread**.

**After restore**

Tell the teacher they can sign in again and download certificates from:

https://codeweek.eu/certificates

*(Same guidance as in the standard EU CodeWeek reply template.)*

**If the summary says “No automated write action proposed”**

- Check Nova → Support Cases for the case number
- Escalate to the technical team with the case # and the 4all code

---

### Example 2 — “Did not receive Certificate of Excellence” (investigation, often not a bug)

**Situation (incoming request to the team)**

EU CodeWeek receives a contact form message; a coordinator forwards it internally:

```text
Hi Bernard,

Can you please see the below? They didn't receive the certificate.

Code: cw25-iKlWI

---

From: Code Week <info@codeweek.eu>
Subject: New Contact Form Submission

First Name: Concetta
Last Name: Garufo
Email: concetta.garufo@gmail.com
Subject: Certificates

Message:
Good morning, I am writing to request information regarding the 2025 Certificate
of Excellence, which we have not yet received. Our school participated in the
activities using the code cw25-iKlWI. The name of the school is I.C. "S. Gangitano",
Canicatti (Ag). I look forward to hearing from you soon. Kind regards
```

**What to send to the support copilot**

```text
To: [support inbox]
From: bernard@matrixinternet.ie
Subject: codeweek-support — Certificate of Excellence not received

Hello,

Request type: certificate inquiry

Contact email: concetta.garufo@gmail.com
CodeWeek 4all code: cw25-iKlWI
School: I.C. "S. Gangitano", Canicatti (Ag)

The school reports they did not receive the 2025 Certificate of Excellence.
Please check eligibility for this code and summarise why a certificate was or
was not issued.

Reported via: EU CodeWeek contact form (forwarded by Rachele)
```

**What the copilot does today (V1)**

| Step | Automatic? | Result |
|------|------------|--------|
| Ingest email | Yes | Case created if rules met |
| Triage | Yes | Type **`certificate_issue`** (keyword “certificate”) |
| User lookup | Yes | Audit for `concetta.garufo@gmail.com` |
| **4all code eligibility report** | **Not yet** | Code `cw25-iKlWI` is **not** auto-analysed in V1 |
| Proposed write / APPROVE | No | **No account change** — this is an explanation ticket |

You still get a dry-run summary at **codeweek@matrixinternet.ie**, but a **human (or dev team)** must confirm eligibility using internal tools until the copilot is extended.

**Actual outcome for this ticket (correct behaviour — not a platform bug)**

Investigation showed code **cw25-iKlWI** was **not** selected as a **2025 Certificate of Excellence** winner, so **no Excellence certificate was generated or sent**.

For **2025**, a code qualifies if it reaches **either**:

- **At least 10 organisers** across approved activities, **or**
- **At least 3 countries** across approved activities

**This code’s stats:**

| Metric | Value | Excellence threshold (2025) | Met? |
|--------|-------|-----------------------------|------|
| Activities | 10 | — | — |
| Participants | 428 | — | — |
| Organisers | 8 | ≥ 10 | No |
| Countries | 1 | ≥ 3 | No |

**Suggested reply to the school / coordinator**

```text
We checked CodeWeek 4all code cw25-iKlWI for 2025. It was not selected as a
Certificate of Excellence winner, so no Excellence certificate was generated
or sent for this code.

For 2025, a code qualifies if it reaches either at least 10 organisers or
at least 3 countries across approved activities. This code recorded
10 activities, 428 participants, 8 organisers, and 1 country, so it did not
meet the 2025 Excellence thresholds.

Participation certificates (where applicable) can still be available from the
user’s account at https://codeweek.eu/certificates after signing in.
```

**Will emailing the inbox “fix” this?**

**No automated fix** — there is nothing broken to repair. The goal is a **clear summary of why** no Excellence certificate was issued so the team can reply accurately.

**V1:** Email → case + user audit → manual eligibility check → reply using template above.

**Planned improvement:** Copilot reads the **4all code**, compares activity stats to Excellence rules, and includes a **ready-made explanation** in the dry-run email (no APPROVE needed).

**If the summary says “No automated write action proposed”**

That is **expected** for this ticket type. Use Nova case # + internal checks, then send the explanation to the teacher.

---

### Example 3 — Fix profile first / last name (with APPROVE)

**Situation:** A user’s profile shows the full name in the first-name field (e.g. First name `Bernard Hanna`, Last name `Last Name`).

**What to send to the support copilot:**

```text
To: [support inbox]
From: bernard@matrixinternet.ie
Subject: codeweek-support — update user profile name

Email: bernard@matrixinternet.ie

Current first name: Bernard Hanna
Current last name: Last Name

Requested first name: Bernard
Requested last name: Hanna

Please update the profile name fields. Email address must stay the same.
```

**Expected:** Dry-run summary with **Before** / **After** names and **Proposed action: user_profile_update**. Reply **APPROVE** to apply.

**Full list of allowed actions:** see [support-copilot-allowed-actions.md](./support-copilot-allowed-actions.md).

---

## What happens after you send the email

| When | What happens |
|------|----------------|
| **Within ~1 minute** | The system reads the inbox and creates a support case |
| **Shortly after** | A summary is emailed to **codeweek@matrixinternet.ie** |
| **Subject of summary** | `[CW-SUPPORT #123] Support copilot - dry run review` |
| **Sender** | Code Week Bot (automated) |

The summary includes:

- Case number
- Your original subject
- User email checked
- What the system found
- Whether it **proposes an action** or only reports findings

**You do not need to use admin tools or run commands** — logging the ticket is done by email only.

---

## How to approve a change (only when asked)

Read the summary email carefully.

### If it says: *“No automated write action proposed”*

- **Do not** reply `APPROVE`
- Handle the case manually (or ask the dev team / check Nova if you have access)

### If it says: *“To execute this change, reply… APPROVE”*

1. **Reply in the same email thread** (use Reply, not a new email)
2. Put **only this on the first line** of your reply:

   ```text
   APPROVE
   ```

   (`APPROVED`, `YES`, or `PROCEED` also work. Must be on its own line near the top of the reply.)
3. Send from **`@matrixinternet.ie`** or **`@codeweek.eu`**
4. Wait up to ~1 minute for the system to process your reply
5. You will receive a **follow-up email** in the same thread:
   - **`action completed`** — change was applied
   - **`action failed`** — change was not applied (see errors in the email; check Nova)

---

## What the system can and cannot do (V1)

| Request | Supported via email? | Notes |
|---------|----------------------|--------|
| Check user / account status | Yes | You get a summary |
| **Restore soft-deleted account** | Yes, with approval | Use words like *restore*, *soft-deleted*, *deleted account*; reply **APPROVE** if proposed |
| **Update profile first / last name** | Yes, with approval | Use *update profile*, *first name*, *last name*; reply **APPROVE** if proposed |
| Change user email address | **No** | Contact dev team — use CLI `support:user-update-email` |
| **Certificate of Excellence not received** | Partial (V1) | Classifies ticket + user audit; **4all code eligibility explanation is manual** (see Example 2) |
| Missing events / roles | Partial | Summary only; manual follow-up |
| Vague or unclear requests | Limited | May show “unknown” type — team reviews manually |

---

## Frequently asked questions

**Q: I didn’t get a summary at codeweek@matrixinternet.ie**

Check: correct inbox, subject contains `codeweek-support`, sent from `@matrixinternet.ie` or `@codeweek.eu`, user email in body. Wait 10 minutes, then contact your technical lead.

**Q: Can I forward an email from a teacher/parent?**

Not as-is. Send a **new** email from your work address with `codeweek-support` in the subject and the user’s email in the body.

**Q: Is it safe? Will it change production data without us knowing?**

V1 is **dry-run by default**. Most tickets only send a summary. Writes (e.g. account restore) only run after an explicit **APPROVE** from an allowed address, and only when the summary proposes that action.

**Q: Who gets the summary?**

**codeweek@matrixinternet.ie** (team inbox). The person who logged the ticket does not automatically get a copy unless they’re on that distribution.

**Q: Where can admins see full detail?**

Nova → **Support Cases** (internal admin).

---

## Escalation

| Situation | Contact |
|-----------|---------|
| Email not picked up after 10+ minutes | Technical lead / dev team |
| Wrong user, urgent production issue | Dev team + Nova case # from summary |
| Email change, merge accounts, complex data fix | Dev team (not automated in V1) |

**Technical contact:** `________________________`

**Support inbox address:** `________________________`

---

## Quick reference card

```text
TO:      [support inbox]
FROM:    @matrixinternet.ie or @codeweek.eu
SUBJECT: codeweek-support — [short description]
BODY:    User email: someone@example.com
         Problem: ...
         Request: ...

WAIT:    ~1 min → summary at codeweek@matrixinternet.ie

APPROVE: Only if summary asks — reply with first line: APPROVE
```

---

## Internal reference (technical team)

| Setting | Value |
|---------|--------|
| Subject prefix | `codeweek-support` |
| Summary recipient | `codeweek@matrixinternet.ie` |
| Allowed sender domains | `matrixinternet.ie`, `codeweek.eu` |
| Config | `config/support_gmail.php` |
| Verify on server | `php artisan support:gmail:setup-check` |
| **Allowed actions (full list)** | [support-copilot-allowed-actions.md](./support-copilot-allowed-actions.md) |
| CLI profile fix | `php artisan support:user-update-profile {email} --firstname= --lastname= [--dry-run]` |
