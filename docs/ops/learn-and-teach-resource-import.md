# Learn & Teach resource import

Internal runbook for publishing resources to **Learn & Teach**  
(`https://codeweek.eu/resources/learn-and-teach`).

Use this when the content team delivers a multi-sheet Excel workbook (metadata) plus PDFs/thumbnails (often on SharePoint).

---

## What gets published

| Kind | What it is | How `source` works |
|------|------------|--------------------|
| **Localised PDFs** | One resource per language (e.g. Albanian *Kodo një Mik*) | PDF uploaded to S3 (`RESOURCES_BUCKET`); card opens that PDF |
| **Third-party links** | External courses/sites (Intel Articulate, Science-on-Stage, etc.) | `source` is an `https://…` URL; card opens it in a **new tab** |

Frontend: `ResourceCard` uses `resource.source` with `target="_blank"`.

Language filter: each localised row is tagged with `filters_language` (e.g. Albanian). Users filter via the **Languages** control on the page — not via the site locale switcher (Shqip / English in the header).

---

## Tools in this repo

| Piece | Role |
|-------|------|
| `php artisan resources:import {file}` | CLI import: reads CSV/Excel next to `images/` + `links/`, uploads to S3, creates/updates `ResourceItem` |
| `/admin/resources-import` | Super-admin UI (verify → preview → import). Supports multi-sheet Learn & Teach workbooks + optional assets ZIP (after `learn-tech-import` is merged) |
| `scripts/prepare-learn-teach-upload.py` | Flattens multi-sheet Excel → `metadata.csv` + folder layout; copies from a local SharePoint sync folder |
| `scripts/download-learn-teach-from-sharepoint.py` | Downloads PDFs/thumbnails via **Microsoft Graph** using `az login` |
| `App\Services\LearnTeachWorkbookParser` | Parses the multi-sheet workbook; **reads Excel hyperlink targets** on Link cells |
| `App\Services\SharePointAssetFetcher` | Optional: fetch SharePoint URLs during import (only if the server can access the link) |

S3 config (server `.env`):

- `RESOURCES_BUCKET` / `RESOURCES_URL`
- `AWS_ACCESS_KEY_ID` / `AWS_SECRET_ACCESS_KEY` / `AWS_DEFAULT_REGION`

No extra AWS form is needed in the admin UI — imports use that disk (`resources`).

---

## Spreadsheet format

Typical delivery: one Excel file with:

- **One sheet per resource group** (e.g. `Code a Friend`, `Binary Number Challenge`)
- Row 1 = headers  
- Row 2 = English group blurb (no language) — **skipped** by the parser  
- Row 3+ = one row per language  
- Final sheet: **`Third party resources`**

Important columns (display names → import keys):

| Spreadsheet | Import key |
|-------------|------------|
| Name of the Resource | `name_of_the_resource` |
| Link | `link` |
| Description | `description` |
| Filters - TYPE | `filters_type` |
| Filters - TARGET AUDIENCE | `filters_target_audience` |
| Filters - LEVEL OF DIFFICULTY | `filters_level_of_difficulty` |
| Filters - PROGRAMMING LANGUAGE | `filters_programming_language` |
| Filters - SUBJECT | `filters_subject` |
| Filters - TOPICS | `filters_topics` |
| Filters - LANGUAGE / Language | `filters_language` |
| Image | `image` |

The import also sets `group_name` from the **sheet title** (used to find PDFs under `links/{group_name}/`).

### Link column gotchas

1. **PDF filename** (most localisation rows): e.g. `ALBANIAN_02 Code a Friend_LOCALISED.pdf`  
   → must exist under `links/{group}/` (or be downloadable).
2. **SharePoint URL** (sometimes): full `https://….sharepoint.com/…pdf`  
   → download locally first, or use Graph script / guest-accessible fetch.
3. **Excel hyperlink on title text** (Intel third-party): cell *displays* the course title but the real URL is the hyperlink (e.g. `https://share.articulate.com/…`).  
   **Always read the hyperlink target**, not only the visible value.  
   `LearnTeachWorkbookParser` and `prepare-learn-teach-upload.py` do this.

### Image column

Local filename (`Binary number challenge.png`) → file in `images/`.  
Or an `https://…` URL (kept / fetched when possible).

---

## Folder layout for CLI import

```
learn-teach-upload-YYYY/
├── metadata.csv          # flattened rows
├── images/               # thumbnails
└── links/
    ├── Binary Number Challenge/
    │   └── ALBANIAN_01 ….pdf
    ├── Code a Friend/
    │   └── …
    └── …
```

The Excel/CSV path and the `images` / `links` folders must sit in the **same directory**.

```bash
php artisan resources:import /path/to/learn-teach-upload-YYYY/metadata.csv --focus --batch-timestamp
```

Useful flags:

| Flag | Meaning |
|------|---------|
| `--focus` | Create missing filter options (types, levels, languages, …) |
| `--batch-timestamp` | Same Unix suffix for all S3 files in this run |
| `--stable-names` | No timestamp (overwrites same S3 key) |
| `--preserve-filenames` | Use local basenames as S3 keys |

---

## Recommended workflow

### 1. Get PDFs from SharePoint (authenticated)

SharePoint is not anonymously downloadable. Use Azure CLI against the JA Europe tenant, then Graph:

```bash
az login --tenant dc75c1d7-1a32-4e97-af90-1dc01911ea6c --allow-no-subscriptions

python3 scripts/download-learn-teach-from-sharepoint.py \
  --xlsx "docs/internal/New Resources Learn&Teach Metadata - 23 June 2026.xlsx" \
  --out docs/internal/learn-teach-upload-2026

# Optional: one language only
python3 scripts/download-learn-teach-from-sharepoint.py --languages Albanian
```

Then rebuild metadata (and optionally re-copy from a sync folder):

```bash
python3 scripts/prepare-learn-teach-upload.py \
  --xlsx "docs/internal/New Resources Learn&Teach Metadata - 23 June 2026.xlsx" \
  --out docs/internal/learn-teach-upload-2026 \
  --source-dir docs/internal/learn-teach-upload-2026
```

Working assets stay under **`docs/internal/`** (gitignored). Do **not** commit PDFs/ZIPs.

Zip for admin UI upload if needed:

```bash
cd docs/internal/learn-teach-upload-2026
zip -r learn-teach-assets.zip links images
```

### 2. Test on DEV first

Servers (Forge). Host addresses are in the credentials vault — do not commit them here.

> **Security note:** earlier revisions of this file contained the real dev and live IP addresses, and they remain in this public repository's git history. Redacting the file does not undo that. The actual mitigations are rotating the `forge` SSH keys and restricting SSH ingress at the AWS security group. See [docs/handover/12-risks-and-known-issues.md](../handover/12-risks-and-known-issues.md).

| Env | SSH | App dir |
|-----|-----|---------|
| **DEV** | `ssh -i ~/.ssh/id_rsa forge@<dev-host>` | `cd dev.codeweek.eu` |
| **Live** | `ssh -i ~/.ssh/id_rsa forge@<live-host>` | `cd codeweek.eu` |

```bash
# From your laptop: upload package
scp -i ~/.ssh/id_rsa metadata.csv learn-teach-assets.zip \
  forge@<dev-host>:/home/forge/dev.codeweek.eu/storage/app/learn-teach-upload-2026/

# On DEV — unzip + import in the SAME session
ssh -i ~/.ssh/id_rsa forge@<dev-host>
cd /home/forge/dev.codeweek.eu
cd storage/app/learn-teach-upload-2026 && unzip -o -q learn-teach-assets.zip
cd /home/forge/dev.codeweek.eu
php artisan resources:import "$(realpath storage/app/learn-teach-upload-2026/metadata.csv)" \
  --focus --batch-timestamp
```

**Note:** DEV often uses the same `RESOURCES_BUCKET` as production (`codeweek-resources`). PDFs land in that bucket; DB rows are only on the DEV database until you import on live.

### 3. QA on DEV

1. Open https://dev.codeweek.eu/resources/learn-and-teach  
2. Hard refresh (`Cmd+Shift+R`)  
3. **Languages** filter → Albanian (or another language) — expect localised titles  
4. Open **View lesson** → correct language PDF from S3  
5. Spot-check a third-party card → Articulate / external site in a new tab  

If the language filter shows **no cards** after selecting a language while you were on page 2+, you need the ResourceForm fix (filters must reset to page 1). That fix lives on branch `learn-tech-import`.

### 4. Publish on live

Same upload + unzip + `resources:import` on `codeweek.eu`, then QA on  
https://codeweek.eu/resources/learn-and-teach  

Prefer **one SSH session** for unzip + import so assets are present on the same host that runs Artisan.

### 5. Git / deploy flow for code changes

Feature work (importer, scripts, UI fixes):

1. Branch (e.g. `learn-tech-import`)  
2. PR → `dev`  
3. QA on DEV  
4. PR → `main` / `master`  

Do not push one-off PDF packages to git.

---

## Admin UI path (when deployed)

1. Sign in as **super admin**  
2. `/admin/resources-import`  
3. Upload multi-sheet `.xlsx` **or** `metadata.csv`  
4. Optionally upload assets ZIP (`links/` + `images/`)  
5. Enable **Focus** → **Verify** → edit Link/Image in preview if needed → **Import**  

Third-party hyperlinks are resolved by `LearnTeachWorkbookParser` when uploading the raw workbook.

---

## Troubleshooting

| Symptom | Likely cause | Fix |
|---------|--------------|-----|
| Card link is a PDF **filename**, not S3 URL | `links/` missing or wrong path at import time | Re-upload assets; import with absolute path to CSV in same dir as `links/` |
| Intel courses open nothing / show title as URL | Excel hyperlink not read | Re-parse with hyperlink-aware parser; update `source` to Articulate URL |
| Language filter returns empty | UI stayed on page 2+ after selecting language | Deploy ResourceForm fix; or click Search / go to page 1 |
| SharePoint download fails (login HTML) | No auth / wrong tenant | `az login` to JA Europe tenant; use Graph download script |
| Filter values missing | Typo vs DB (`beginners`, `Ukranian`, …) | Import with `--focus` or normalise spreadsheet |
| English “Uploaded on …” date looks old | Description text from an earlier English upload | Localisation batch often has no English rows; update English description separately if needed |

Check recent rows:

```bash
php artisan tinker --execute="
\$n = \\App\\ResourceItem::where('updated_at', '>=', now()->subHour())->count();
echo \"updated last hour: \$n\n\";
"
```

---

## June 2026 batch (reference)

- Workbook: `docs/internal/New Resources Learn&Teach Metadata - 23 June 2026.xlsx`  
- ~12 resource groups × 17 languages ≈ **204 PDFs**  
- **16** third-party rows (12 Articulate + others with plain URLs)  
- Package dir used: `docs/internal/learn-teach-upload-2026/`  
- Branch with importer/UI/script improvements: `learn-tech-import`  

---

## Related code

- `app/Imports/ResourcesImport.php`  
- `app/Console/Commands/ImportResourcesFromExcel.php`  
- `app/Http/Controllers/ResourcesImportController.php`  
- `resources/js/components/ResourceForm.vue` / `ResourceCard.vue`  
- `config/filesystems.php` → `disks.resources`  
