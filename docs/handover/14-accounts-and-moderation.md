# 14 — Accounts, profiles, and moderation

This chapter follows a person from the moment they hit **Register** to the moment their activity is approved, and explains who is allowed to approve what. Read it alongside [04](04-domain-model.md) for the data model and [05](05-nova-admin.md) for the Nova side.

It exists mainly because of one recurring support question — *"why am I not showing on the community page?"* — which has several different causes that look identical from the outside. That diagnosis is in [Why am I not on the community page?](#why-am-i-not-on-the-community-page) below. If you are picking up support duty, start there.

## The shape of an account

There is no separate "profile" record. A person is a single row in `users`, and everything — ambassador, leading teacher, activity organiser — is that same row with different roles and columns filled in. This matters: there is no onboarding wizard that guarantees a complete profile, so most accounts are partially filled in, and the public pages silently hide incomplete ones.

## Registration

Authentication is **Laravel UI** (`Auth::routes()`), not Breeze, Jetstream, or Fortify. Do not expect Fortify conventions. There are two front doors.

### Front door 1: email and password

`GET /register` → `POST /register`, handled by `App\Http\Controllers\Auth\RegisterController`. The whole of `Auth::routes()` sits behind Spatie's honeypot middleware, and the register form renders `@honeypot`.

Only four things are validated:

```50:56:app/Http/Controllers/Auth/RegisterController.php
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'string', Password::defaults()],
            'privacy' => 'required',
        ]);
    }
```

`Password::defaults()` is configured in `AppServiceProvider` as minimum 10 characters, mixed case, letters, numbers, symbols, and checked against the compromised-password list. That is stricter than most sites, and it is a common source of "I can't register" complaints.

Note what happens to `name` — it becomes `firstname`, and `lastname` is deliberately set to an empty string:

```63:70:app/Http/Controllers/Auth/RegisterController.php
        $user =  User::create([
            'firstname' => $data['name'],
            'lastname' => '',
            'username' => '',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'privacy' => 1,
        ]);
```

So **every new account starts with no last name, no country, no city, no bio, no avatar, no role, and `approved = false`.** The profile form is where all of that gets filled in, and nothing forces the user to go there.

### Front door 2: social login

`GET /login/{provider}` → `GET /login/{provider}/callback`. Four providers are permitted at runtime: `google`, `facebook`, `twitter`, `github`, configured in [config/services.php](../../config/services.php). Azure or Microsoft login does **not** exist despite occasional questions about it.

`App\Services\SocialUserLoginService` matches on `(provider, provider_id)` first, then falls back to a case-insensitive email match, and only creates a row if neither matches:

```36:47:app/Services/SocialUserLoginService.php
            return User::create([
                'email' => $oauthEmail,
                'password' => bcrypt(Str::random()),
                'firstname' => $socialUser->getName() ?: $socialUser->getNickname(),
                'lastname' => '',
                'username' => $socialUser->getNickname() ?: '',
                'provider' => $provider,
                'provider_id' => $providerId,
                'magic_key' => random_int(1000000, 2000000) * random_int(1000, 2000),
                'email_verified_at' => Carbon::now(),
            ]);
        }
```

Two consequences worth knowing:

- Social accounts are **created already email-verified**, because `email_verified_at` is set at creation. They never see the verification screen.
- If the provider does not return an email address, the callback logs it, emails the admin address, and `abort(500)`s. A user reporting "I get an error page when logging in with Facebook" almost always means a Facebook account with no shared email.

### Email verification

`App\User` implements `MustVerifyEmail`, but the `verified` middleware is applied to only two routes: `GET /profile` and `GET /participation`. Everything else, including submitting an activity, works unverified. Verification links land back on `/profile`.

### The consent gate

Every authenticated web request passes through `App\Http\Middleware\CheckConsent`:

```18:22:app/Http/Middleware/CheckConsent.php
        if (Auth::check() && !Auth::user()->hasGivenConsent()) {
            if (!in_array($request->route()->getName(), $excludedRoutes)) {
                return redirect()->route('consent.show');
            }
        }
```

Anyone whose `consent_given_at` is null is redirected to `/consent` on every page until they accept. Declining logs them out. If a user reports being "stuck in a loop" or "always sent to the same page", this is why — including for social logins, which skip verification but not consent.

## The profile

| Purpose | Route | Middleware |
|---------|-------|------------|
| View and edit own profile | `GET /profile` | `auth`, `verified` |
| Save profile | `PATCH /user` (`user.update`) | `auth` |
| Delete own account | `GET /user/delete` | `auth` |
| Change login email | `POST /user/email-change/*` | `auth` |
| Upload avatar | `POST /api/users/{user}/avatar` | `auth` |

`GET /profile` is a closure in [routes/web.php](../../routes/web.php) that passes the logged-in user to the `profile` view as `$profileUser`, with cache headers set to `no-store`. There is no `ProfileController`.

**There is no public profile page for an individual.** Members are only ever exposed through the `/community` listings and the role-restricted `/badges/user/{user}` page. `AmbassadorController::profile()` exists but has no route pointing at it — dead code, do not rely on it.

### What the form validates

```21:33:app/Http/Controllers/UserController.php
        $user->update(request()->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'privacy' => 'required',
            'receive_emails' => 'required',
            'country_iso' => 'required|exists:countries,iso',
            'city_id' => 'nullable|exists:cities,id',
            'twitter' => 'nullable',
            'website' => 'nullable',
            'bio' => 'nullable',
            'email_display' => 'nullable|email',
            'tag' => 'nullable',
        ]));
```

A few things to note:

- **City is optional.** This is the root of the community-page problem below. It is deliberate — plenty of members have no reason to publish a city — but it has visible consequences for leading teachers.
- **Country is required**, and matches the asterisk on the form label. It was previously `nullable` while the label claimed otherwise, so the field could be silently saved empty; see [12](12-risks-and-known-issues.md).
- `bio` has no length rule here, but the column is `varchar(2500)`. A longer bio fails at the database, not in validation.
- The login email is **not** in this list and cannot be changed here. Email changes go through the separate confirm-by-signed-link flow in `UserEmailChangeController`.
- `email_display` is a different, optional, public-facing address.

### City selection

City is a plain `<select>` populated by a view composer in `AppServiceProvider`, which loads every city in the active countries, and narrowed client-side by `cityFilter()` in [public/js/ext/functions.js](../../public/js/ext/functions.js) when the country changes.

This is **not** the ArcGIS autocomplete used by the activity form. The `/api/proxy/geocode` and `/api/proxy/suggest` endpoints exist but are not wired into the profile. So a user can only pick a city that already exists in the `cities` table for their country — if their town is missing, they cannot add it, and the practical answer is to pick the nearest listed city or insert the row via Nova.

The leading-teacher signup form is different again: it requires a city, and pre-selects the closest one from GeoIP via `City::getClosestCity()`.

### Avatars

The avatar uploader is rendered only for ambassadors and super admins:

```19:23:resources/views/profile.blade.php
                        @role('ambassador|super admin')
                        <avatar-form :user="{{ $profileUser }}"></avatar-form>
                        @else
                        <h1>{{ $profileUser->fullName }}</h1>
                        @endrole
```

Everyone else, **including leading teachers**, has no way to set a picture from the profile page. Uploads go to S3 under `avatars/{userId}/`, plus an 80px resized copy. Deleting an avatar does not null the column; it sets it to the string `avatars/default.png`.

Be careful here: there are three different "default avatar" strings in the codebase (`avatars/default_avatar.png`, `avatars/default.png`, `images/default-avatar.png`) and different code paths check for different ones. `User::communityAvatarUrl()` is the method that normalises them to a local placeholder for public pages.

### Deleting an account

There are two entirely different deletion paths, and confusing them causes real damage:

- **User-initiated**, `GET /user/delete`, is a **soft delete**. The row stays, `deleted_at` is set, the user is logged out. This is reversible — the support tooling has a `UserRestoreService` for exactly this.
- **GDPR cleanup**, the `users:delete-without-consent` command dispatching `ProcessUserDeletion`, is a **hard force-delete**, and reassigns the person's activities to the legacy placeholder user `1000000`. This is not reversible.

See [10](10-scheduled-jobs-and-runbooks.md) before running anything in the second category.

## Becoming someone: roles

A registered user has **no role at all**. Roles come from three places: the leading-teacher signup form, volunteer approval, and manual admin action.

| Role | Permissions from the seeders | Nova access |
|------|------------------------------|-------------|
| `super admin` | all of them | yes |
| `ambassador` | `moderate event` | yes |
| `resource editor` | `moderate resource` | yes |
| `leading teacher` | `submit resource` | no |
| `leading teacher admin` | *none assigned* | no |
| `activities admin` | `feature event` | no |
| `member` | `create event`, `create school` | no |
| `event owner` | `update event`, `generate certificate` | no |
| `school manager` | `update school`, `generate certificate` | no |

Roles are seeded by `RolesAndPermissionsSeeder`, `LeadingTeacherRoleSeeder`, `ActivitiesAdministratorRoleSeeder`, and `ResourceEditorRoleSeeder`.

Two traps in that table. First, `leading teacher admin` has no permissions attached, so it only works because routes check the role *name* directly. Second, the `moderate event` permission is seeded for ambassadors but **never checked anywhere** — every moderation check in the codebase tests `hasRole('ambassador')` instead. If you try to grant moderation by attaching the permission to another role, nothing will happen.

### Leading teacher

`GET /leading-teachers/signup` renders the `LeadingTeacherSignupForm` Livewire component. It requires name, country, **city**, levels, subjects, expertises, and a tag. On submit it fills the profile and assigns the role:

```140:145:app/Livewire/LeadingTeacherSignupForm.php
        $user->city_id = $this->selectedCity;
        $user->country_iso = $this->selectedCountry;

        $user->save();

        $user->assignRole('leading teacher');
```

Note what it does **not** do: set `approved`. The role is granted instantly, but `approved` stays `false`, so the person does not appear publicly until an admin approves them at `/leading-teachers/list` (super admin or leading teacher admin only). That list is the Livewire `LeadingTeachersTable`, with bulk Approve, Disallow, and Export actions.

There is also a dead `POST /leading-teachers/signup` route whose controller body is commented out. The live submission is the Livewire `wire:submit`.

### Ambassador

There is no self-service ambassador application in the app. `GET /volunteer` records a `Volunteer` row, and an admin visiting `/volunteer/{volunteer}/approve` calls `assignRole('ambassador')`. `/beambassador` is a static information page, and for the 2026 cycle the community page points at an external Microsoft Form. Assigning the role by hand in Nova via the `Ambassador` resource is the normal route in practice.

Ambassadors are scoped by their own `users.country_iso`. **An ambassador with an empty country moderates nothing**, because every scoping query compares against that column.

## Why am I not on the community page?

`/community` has two independent sections with completely different visibility rules:

```20:31:app/Http/Controllers/CommunityController.php
        $ambassadors = User::role('ambassador')
            ->filter($filters)
            ->whereRaw("bio is not null and trim(bio) <> ''")
            ->whereRaw("avatar_path is not null and trim(avatar_path) <> ''")
            ->where('avatar_path', '<>', 'images/default-avatar.png')
            ->paginate(10);

        $teachers = User::role('leading teacher')
            ->where('approved', 1)
            ->filter($filters)
            ->with(['city', 'expertises'])
            ->get();
```

Work through this in order when someone reports being missing.

**For an ambassador**, all four must be true:

1. They hold the `ambassador` role.
2. Their `country_iso` matches the country being viewed — the page is always filtered by country, and lands on the visitor's GeoIP country by default.
3. Their `bio` is non-empty.
4. Their `avatar_path` is non-empty and is not `images/default-avatar.png`.

Missing bio or avatar is the usual answer, and it fails **silently** — there is no warning anywhere telling the ambassador why they are hidden.

**For a leading teacher**, all of these must be true:

1. They hold the `leading teacher` role.
2. `approved = 1` — set by an admin at `/leading-teachers/list`, never by signup.
3. Their `country_iso` matches the country being viewed.
4. **They have a city, and that city has coordinates.**

That last one is the most common and most confusing cause. The leading-teacher section of the page *is* a map, and the map groups teachers by `city_id` and then skips any group whose city has no coordinates:

```747:748:resources/views/community.blade.php
            @foreach ($teachers->groupBy('city_id') as $cityId => $teachersInCity)
                @if ($teachersInCity[0]->city && $teachersInCity[0]->city->latitude && $teachersInCity[0]->city->longitude)
```

A teacher with no city falls into the `null` group, that group fails the condition, and they are rendered nowhere at all. They are still in the `$teachers` collection — so they will show up in a `dd()` or a database query — but they never reach the page. That gap between "the query returns them" and "the page shows them" is what makes this so hard to diagnose from a support ticket.

Two things now help:

- The profile page shows a warning to any leading teacher whose `city_id` is null, telling them they will not appear on the map until they select a city. It is keyed as `base.city_required_for_community_map` in all 30 locale files, currently with English text everywhere pending translation.
- `/leading-teachers/list` has a **City** column and a City filter with a **Not set** option, so an admin can list everyone in this state and chase them. Combine it with the Approved filter to find approved teachers who are invisible.

Neither changes the map itself. If the requirement later becomes "nobody is ever invisible", the `countries` table already carries `longitude` and `latitude` that could serve as a fallback centroid; that would be a deliberate product change, not a bug fix.

## Submitting an activity

| Purpose | Route |
|---------|-------|
| Form | `GET /add` (`create_event`) |
| Create | `POST /events` |
| Edit form | `GET event/edit/{event}` (`edit_event`) |
| Update | `PATCH /events/{event}` |
| Own activities | `GET /my` (`my_events`) |
| Saved locations | `GET /activities-locations` |

**Login is required** to submit; there is no anonymous submission. The form is a Vue component, `<activity-form>`, not Livewire. Validation lives in `App\Http\Requests\EventRequest`, whose `authorize()` returns `true` unconditionally — access is enforced by route middleware, not the request class.

There is **no honeypot and no Turnstile on the activity form**. Authentication and CSRF are the only barriers.

Location is resolved client-side through ArcGIS: `AutocompleteGeo.vue` calls `/api/proxy/suggest` then `/api/proxy/geocode`, both proxied by `GeocodeController`, and sets `geoposition` plus a country ISO that the user can still override in step 3. If `geoposition` ends up as `0,0`, `Event::relocate()` substitutes the country centroid.

Every public submission starts pending:

```19:19:app/Queries/EventsQuery.php
        $request['status'] = 'PENDING';
```

`status` is a free-form `varchar(50)` with **no database default and no PHP enum**. The three values in use are `PENDING`, `APPROVED`, and `REJECTED`. Do not confuse it with `highlighted_status`, a separate column holding `NONE`, `PROMOTED`, or `FEATURED`.

Editing a rejected activity puts it back in the queue:

```113:116:app/Queries/EventsQuery.php
        //In order to appear again in the list for the moderators
        if ($event->status == 'REJECTED') {
            $request['status'] = 'PENDING';
        }
```

On submission, three emails are queued: `EventRegistered` to the organiser, and `EventCreated` to each ambassador for that country — or `EventCreatedNoAmbassador` to `info@codeweek.eu` if that country has none.

## Moderation

### Who can moderate what

`App\Policies\EventPolicy` is the single source of truth, auto-discovered by Laravel:

```15:32:app/Policies/EventPolicy.php
    public function before($user, $ability)
    {
        if ($user->hasRole('super admin')) {
            return true;
        }
    }

    public function approve(User $user, Event $event)
    {

        //        Log::info("can approve ?" . $user->hasRole('super admin'));

        if ($user->hasRole('ambassador')) {
            return $event->country_iso === $user->country_iso;
        }

        return false;
    }
```

Super admins bypass everything through `before()`. Ambassadors are confined to activities whose `country_iso` equals their own. Nobody else can approve, whatever permissions they hold.

The same country scoping is repeated, rather than shared, in several places — the pending queue, the Nova index query, the review table, and the review controller's country picker. If you change the scoping rule, you must change all of them:

```18:30:app/Queries/PendingEventsQuery.php
        return Event::where(function ($query) use ($country) {

            if (! auth()->user()->hasRole('super admin')) {
                $query->where('country_iso', '=', Auth::user()->country->iso);
            }

            if (! is_null($country)) {
                $query->where('country_iso', '=', $country->iso);
            }

            $query->Where('status', 'like', 'PENDING');

        })->orderBy('updated_at', 'asc')->paginate(30);
```

### The three moderation surfaces

| Surface | Route | Who | Notes |
|---------|-------|-----|-------|
| Pending activities, card grid | `/pending`, `/pending/{country}` | super admin, ambassador | The country variant is super-admin only. Has an **Approve all** button |
| Review, Livewire table | `/review`, `/review/{country}` | super admin, ambassador | Bulk approve. Country variant super-admin only |
| Nova Events | `/nova/resources/events` | super admin, ambassador | Filter by status; ambassadors auto-scoped by `indexQuery` |

Ambassadors reach `/pending` from the profile dropdown. Pending counts per country come from `CountriesQuery::withPendingEvents()`.

### What approve and reject actually do

Both live on the model, and both send email. `Event::approve()` sets the status, records `approved_by`, and queues `EventApproved`. `Event::reject($reason)` creates a `moderations` row with the reason, sets the status, records `approved_by`, and queues `EventRejected`.

The rejection reason is captured in the `ModerateEvent.vue` modal, which offers four preset reasons from `resources/lang/*/moderation.php` plus a free-text box, and is stored in `moderations.message`. The organiser sees the latest message on the activity page and in the email.

Approval also has a side effect via `EventObserver`: when an activity crosses into or out of `APPROVED` and has a `leading_teacher_tag`, experience is awarded to or stripped from that leading teacher.

### Sharp edges in moderation

These are behaviours to know before you change anything here.

- **Editing the Status field directly in Nova bypasses `approve()` and `reject()` entirely.** No email is sent and no moderation record is written. Ambassadors have full edit rights on activities in their country, so this is easy to do by accident. Always use the Approve and Reject actions.
- **Bulk uploads and partner imports are auto-approved.** `GenericEventsImport` and roughly twenty named importers hardcode `'status' => 'APPROVED'`, as does the Germany API sync. Nothing else auto-approves; there is no "trusted organiser" logic. See [06](06-bulk-uploads-and-imports.md) and [07](07-partner-feeds-and-apis.md).
- `EventsQuery::trigger()` tests `status = 'FEATURED'`, but `FEATURED` is a value of `highlighted_status`, not `status`. That branch can never match.
- `App\Http\Controllers\ModerationController` is an empty scaffold and there is no Nova resource for `Moderation`. All moderation logic is on the `Event` model.

Two related bugs were fixed as part of this handover and are recorded in [12](12-risks-and-known-issues.md): rejection used to swallow its own authorization failure, letting any ambassador reject any country's activities, and the Nova Reject action used to send the organiser an email with no reason in it.

## Approving leading teachers

Separate from activities, and not in Nova. `GET /leading-teachers/list`, restricted to `super admin` and `leading teacher admin`, renders `LeadingTeachersTable`. Select rows and use the Approve bulk action, which sets `approved = true`.

Filter by **Approved: No** to find the backlog, and by **City: Not set** to find approved teachers who will still be invisible on the map. Exporting the selection produces an xlsx via `UsersExport`.
