<?php

namespace App\Console\Commands\api;

use App\Event;
use App\Tag;
use App\Theme;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

trait GermanTraits
{
    private function loadJson($url)
    {
        $client = new \GuzzleHttp\Client();
        $guzzle = $client->request('get', $url);
        return json_decode($guzzle->getBody(), true);
    }

    private function createRSSItem($json, $city): void
    {
        $new = 0;
        $updated = 0;

        foreach ($json as $index => $item) {
            try {
                Log::info("Processing item {$index} from {$city}");

                if (empty($item['uid']) || !isset($item['user'])) {
                    Log::warning("Item {$index} in {$city} missing uid or user - skipping");
                    continue;
                }

                $className = '\\App\\RSSItems\\' . $city . 'RSSItem';
                if (!class_exists($className)) {
                    Log::error("RSSItem class not found for city={$city}");
                    continue;
                }

                $lat = isset($item['latitude']) && is_numeric($item['latitude']) ? (float)$item['latitude'] : null;
                $lng = isset($item['longitude']) && is_numeric($item['longitude']) ? (float)$item['longitude'] : null;

                $payload = [
                    'uid'            => (int)($item['uid']),
                    'title'          => (string)($item['title'] ?? ''),
                    'description'    => (string)($item['description'] ?? ''),
                    'organizer'      => (string)($item['organizer'] ?? ''),
                    'photo'          => $item['photo'] ?? null,
                    'eventEndDate'   => $item['eventEndDate'] ?? null,
                    'eventStartDate' => $item['eventStartDate'] ?? null,
                    'latitude'       => $lat,
                    'longitude'      => $lng,
                    'location'       => (string)($item['location'] ?? ''),

                    'user_company'     => (string)($item['user']['company'] ?? ''),
                    'user_email'       => (string)($item['user']['email'] ?? ''),
                    'user_publicEmail' => (string)($item['user']['publicEmail'] ?? ''),
                    'user_type'        => (string)($item['user']['type']['identifier'] ?? ($item['user']['type'] ?? 'invite-in-person')),
                    'user_website'     => (string)($item['user']['www'] ?? ''),

                    'activity_type' => (string)($item['type']['identifier'] ?? 'invite-in-person'),

                    'tags'     => trim(implode(';', \Illuminate\Support\Arr::pluck($item['tags'] ?? [], 'title'))),
                    'themes'   => trim(implode(',', \Illuminate\Support\Arr::pluck($item['themes'] ?? [], 'identifier'))),
                    'audience' => trim(implode(',', \Illuminate\Support\Arr::pluck($item['audience'] ?? [], 'identifier'))),

                    'last_updated_at' => now(),
                ];

                try {
                    /** @var \Illuminate\Database\Eloquent\Model $existing */
                    $existing = $className::query()->where('uid', $payload['uid'])->first();

                    if ($existing) {
                        $existing->fill($payload);

                        if ($existing->isDirty()) {
                            $existing->save();
                            $updated++;
                            Log::info("Updated RSS item uid={$payload['uid']} ({$city})");
                        } else {
                            Log::info("No changes for RSS item uid={$payload['uid']} ({$city})");
                        }
                    } else {
                        $className::query()->create($payload);
                        $new++;
                        Log::info("Inserted RSS item uid={$payload['uid']} ({$city})");
                    }
                } catch (\Throwable $e) {
                    // 23000 (duplicate) => retry as update (race condition safe)
                    if (method_exists($e, 'getCode') && (string)$e->getCode() === '23000') {
                        try {
                            $className::query()->where('uid', $payload['uid'])->update($payload);
                            $updated++;
                            Log::warning("Handled duplicate by updating uid={$payload['uid']} ({$city})");
                        } catch (\Throwable $e2) {
                            Log::error("DB upsert retry failed for uid={$payload['uid']} ({$city}): ".$e2->getMessage());
                        }
                    } else {
                        Log::error("DB error for item {$index} in {$city}: ".$e->getMessage());
                    }
                }
            } catch (\Throwable $e) {
                Log::error("Error processing item {$index} from {$city}: ".$e->getMessage());
                Log::error("Item data: ".json_encode($item));
                continue;
            }
        }

        Log::info("{$city}: RSS upsert done. New={$new}, Updated={$updated}");
    }

    /**
     * Create/Update an Event from current RSS item (idempotent, minimal fields).
     * - Prevents duplicates via `events.source_ref` unique key "{feed}:{uid}".
     * - Updates only a safe subset on subsequent syncs (dates & coords, picture if empty).
     * - Guards against overwriting valid coords with default/fallback Germany center.
     *
     * @param  string $city  Feed key, e.g. "bremen", "baden", ...
     * @return void
     */
    private function createGermanEvent(string $city): void
    {
        $feedKey   = Str::slug($city);
        $sourceRef = $feedKey.':'.$this->uid;

        try {
            $user = User::where('email', $this->user_email)->first();
            if (!$user) {
                $user = User::create([
                    'email'     => $this->user_email,
                    'firstname' => $this->organizer,
                    'lastname'  => '',
                    'username'  => $this->organizer,
                    'password'  => bcrypt(Str::random()),
                ]);
            }
            
            $event = Event::where('source_ref', $sourceRef)->first();

            if (!$event) {
                $event = new Event([
                    'status'        => 'APPROVED',
                    'title'         => htmlspecialchars_decode((string)$this->title),
                    'slug'          => Str::slug((string)$this->title),
                    'organizer'     => (string)$this->organizer,
                    'description'   => (string)$this->description,
                    'organizer_type'=> (string)$this->user_type,
                    'activity_type' => (string)$this->activity_type,
                    'location'      => (string)$this->location,
                    'event_url'     => (string)$this->user_website,
                    'contact_person'=> (string)$this->user_publicEmail,
                    'user_email'    => (string)$this->user_email,
                    'creator_id'    => $user->id,
                    'country_iso'   => 'DE',
                    'picture'       => $this->photo,
                    'pub_date'      => now(),
                    'created'       => now(),
                    'updated'       => now(),
                    'start_date'    => $this->eventStartDate,
                    'end_date'      => $this->eventEndDate,
                    'longitude'     => $this->longitude,
                    'latitude'      => $this->latitude,
                    'geoposition'   => $this->latitude.','.$this->longitude,
                    'language'      => 'de',
                    'codeweek_for_all_participation_code' => "cw-$city",
                    'mass_added_for' => 'API codeweek_de',
                    // minimal linkage
                    'source_ref'     => $sourceRef,
                    'source_synced_at'=> now(),
                ]);
                $event->save();

                if (!empty($this->audience)) {
                    $event->audiences()->sync(explode(',', (string)$this->audience));
                }
                if (!empty($this->themes)) {
                    $validThemeIds = $this->validateThemes((string)$this->themes);
                    if ($validThemeIds) {
                        $event->themes()->sync($validThemeIds);
                    }
                }
                if (!empty($this->tags)) {
                    $tagIds = [];
                    foreach (explode(';', (string)$this->tags) as $name) {
                        $name = trim($name);
                        if ($name === '') continue;
                        $tag = Tag::firstOrCreate(['name' => $name], ['slug' => Str::slug($name)]);
                        $tagIds[] = $tag->id;
                    }
                    if ($tagIds) $event->tags()->sync($tagIds);
                }

                Log::info("[GermanTraits] Created event for {$sourceRef}", ['event_id' => $event->id]);
                return;
            }

            $dirty = [];

            if (!empty($this->eventStartDate)) $dirty['start_date'] = $this->eventStartDate;
            if (!empty($this->eventEndDate))   $dirty['end_date']   = $this->eventEndDate;

            $dirty['latitude']    = $this->latitude;
            $dirty['longitude']   = $this->longitude;
            $dirty['geoposition'] = $this->latitude.','.$this->longitude;

            if (empty($event->picture) && !empty($this->photo)) {
                $dirty['picture'] = $this->photo;
            }

            if (empty($event->location) && !empty($this->location)) {
                $dirty['location'] = (string)$this->location;
            }

            if (!empty($dirty)) {
                $dirty['updated'] = now();
                $event->fill($dirty);
            }

            $event->source_synced_at = now();
            $event->save();

            Log::info("[GermanTraits] Updated event for {$sourceRef}", ['event_id' => $event->id, 'changed' => array_keys($dirty)]);
        } catch (\Throwable $e) {
            Log::error('[GermanTraits] createGermanEvent failed', [
                'source_ref' => $sourceRef ?? null,
                'error'      => $e->getMessage(),
            ]);
        }
    }

    protected function validateThemes(string $input): array
    {
        if (empty($input)) {
            return [];
        }
        
        $themeIds = array_unique(array_filter(array_map('trim', explode(',', $input))));

        // Mapping deleted old id to new id group
        $themeIdMapping = [
            7 => 6,
            10 => 9,
            12 => 1,
            15 => 16,
        ];

        $mappedThemeIds = array_map(function ($id) use ($themeIdMapping) {
            return $themeIdMapping[$id] ?? $id;
        }, $themeIds);

        $validThemeIds = Theme::whereIn('id', $mappedThemeIds)->pluck('id')->toArray();

        return $validThemeIds;
    }
    
}
