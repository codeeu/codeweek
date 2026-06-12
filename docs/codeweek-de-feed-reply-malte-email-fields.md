# Reply to Malte — Feed format clarifications (email & organizer type)

**Subject:** Re: Feed export — `type_of_organisation`, email fields, and visibility

---

Hi Malte,

Happy to clarify:

## 1) `type_of_organisation` — object or string?

For the feed, please put the organizer type under **`user.type`**, not as a top-level field.

Our importer accepts **either**:

- `"user": { "type": { "identifier": "non profit" } }` **(preferred)**, or
- `"user": { "type": "non profit" }` **(also works)**

The top-level `type_of_organisation` field is **not read** by our current importer, so you can remove it once it’s mapped into `user.type`.

## 2) “Map `type_of_organisation` → `user.type.identifier`” — same value?

**Yes.** Use the same values as in the Excel guide / registration form, for example:

- `school`
- `library`
- `non profit`
- `private business`
- `other`

## 3) Email fields — which is public?

Your three-email model maps like this:

| Your field | Feed field | Our DB field | Visibility |
|---|---|---|---|
| 1) Personal email of event creator | `user.email` | `user_email` | **Not public** — used internally to link/create the owner account; visible only to EU Code Week ambassadors/organisers for moderation |
| 2) Official org email (e.g. info@…) | *(no dedicated field)* | — | Not stored separately; use `user.company` for org **name**, `user.www` for website |
| 3) Public contact email for the event | `user.publicEmail` | `contact_person` | **Public** — this is what we display as the event contact email when provided |

So **yes**, it’s fine to send the personal creator email in `user.email` even though it’s not intended to be public. That matches how our registration form works (`user_email` = internal contact; `contact_person` = optional public email).

### Recommended mapping

```json
"user": {
  "company": "Organisation name",
  "email": "creator-personal@example.org",
  "publicEmail": "public-contact@example.org",
  "www": "https://organisation.example.org",
  "type": { "identifier": "non profit" }
}
```

If there’s no public contact email for an event, leave `publicEmail` empty.

Let us know if anything is unclear.

Best regards,  
Bernard

---

## Internal reference

- `user.email` is stripped from the public event page HTML for normal visitors (ambassadors/admins only for `user_email`).
- Optional public email: `user.publicEmail` → `contact_person` (displayed on event detail when provided).
- Importer source: `app/Console/Commands/api/GermanTraits.php`
