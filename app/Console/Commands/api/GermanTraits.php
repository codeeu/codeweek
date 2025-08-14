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

                // Validate required data
                if (!isset($item['user'])) {
                    Log::warning("Item {$index} in {$city} has no user data - skipping");
                    continue;
                }

                $className = '\App\RSSItems\\' . $city . 'RSSItem';
                $RSSitem = new $className;

                $RSSitem->uid = $item['uid'] ?? null;
                $RSSitem->title = $item['title'] ?? '';
                $RSSitem->description = $item['description'] ?? '';
                $RSSitem->organizer = $item['organizer'] ?? '';
                $RSSitem->photo = $item['photo'] ?? null;
                $RSSitem->eventEndDate = $item['eventEndDate'] ?? null;
                $RSSitem->eventStartDate = $item['eventStartDate'] ?? null;
                $RSSitem->latitude = $item['latitude'] ?? null;
                $RSSitem->longitude = $item['longitude'] ?? null;
                $RSSitem->location = $item['location'] ?? '';

                // Safely get nested user data
                $RSSitem->user_company = $item['user']['company'] ?? '';
                $RSSitem->user_email = $item['user']['email'] ?? '';
                $RSSitem->user_publicEmail = $item['user']['publicEmail'] ?? '';
                $RSSitem->user_type = $item['user']['type']['identifier'] ??
                    ($item['user']['type'] ?? 'invite-in-person');
                $RSSitem->user_website = $item['user']['www'] ?? '';

                // Safely get type data
                $RSSitem->activity_type = $item['type']['identifier'] ?? 'invite-in-person';

                // Safely handle arrays
                $RSSitem->tags = trim(implode(';', Arr::pluck($item['tags'] ?? [], 'title')));
                $RSSitem->themes = trim(implode(',', Arr::pluck($item['themes'] ?? [], 'identifier')));
                $RSSitem->audience = trim(implode(',', Arr::pluck($item['audience'] ?? [], 'identifier')));

                try {
                    $RSSitem->save();
                    $new++;
                    Log::info("Successfully saved item {$index} from {$city}");
                } catch (\PDOException $exception) {
                    if ($exception->getCode() !== '23000') {
                        Log::error("Database error for item {$index} in {$city}: " . json_encode($exception->errorInfo));
                    }
                }
            } catch (\Exception $e) {
                Log::error("Error processing item {$index} from {$city}: " . $e->getMessage());
                Log::error("Item data: " . json_encode($item));
                continue;
            }
        }

        Log::info("New items imported from $city API: " . $new);
    }

    private function createGermanEvent($city): void
    {
        $user = User::where(['email' => $this->user_email])->first();
    
        if ($user == null) {

            //Create user
            $user = User::create(
                [
                    'email' => $this->user_email,
                    'firstname' => $this->organizer,
                    'lastname' => '',
                    'username' => $this->organizer,
                    'password' => bcrypt(Str::random()),
                ]
            );
        }

        $event = new Event([
            'status' => 'APPROVED',
            'title' => htmlspecialchars_decode($this->title),
            'slug' => Str::slug($this->title),
            'organizer' => $this->organizer,
            'description' => $this->description,
            'organizer_type' => $this->user_type,
            'activity_type' => $this->activity_type,
            'location' => $this->location,
            'event_url' => $this->user_website,
            'contact_person' => $this->user_publicEmail,
            'user_email' => $this->user_email,
            'creator_id' => $user->id,
            'country_iso' => 'DE',
            'picture' => $this->photo,
            'pub_date' => now(),
            'created' => now(),
            'updated' => now(),
            'codeweek_for_all_participation_code' => "cw-$city",
            'mass_added_for' => 'API codeweek_de',
            'start_date' => $this->eventStartDate,
            'end_date' => $this->eventEndDate,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'geoposition' => $this->latitude . ',' . $this->longitude,
            'language' => 'de',
        ]);

        $event->save();

        //Link Other as theme and audience
        if ($this->audience) {
            $event->audiences()->attach(explode(',', $this->audience));
        }
        if ($this->themes) {
            $validThemeIds = $this->validateThemes($this->themes);
            if (count($validThemeIds) > 0 ) {
                $event->themes()->attach($validThemeIds);
            }
        }

        if ($this->tags) {
            $tagsArray = [];

            foreach (explode(';', $this->tags) as $item) {
                $tag = Tag::firstOrCreate([
                    'name' => trim($item),
                    'slug' => str_slug(trim($item)),
                ]);
                array_push($tagsArray, $tag->id);
            }

            $event->tags()->sync($tagsArray);
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
