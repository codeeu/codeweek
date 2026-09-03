<?php

namespace App\Console\Commands\api;

use App\Event;
use App\Helpers\ImporterHelper;
use App\Tag;
use App\Theme;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GermanyCentral extends Command
{
    protected $signature = 'api:germany-central
                            {--url=https://events.codeweek.de/api/v1/export/ : Central DE export URL}
                            {--limit=0 : Limit number of items (0 = all)}
                            {--import : Persist events (default is dry-run only)}';

    protected $description = 'Validate (and optionally import) the central codeweek.de event export';

    private const FEED_KEY = 'codeweek-de';

    public function handle(): int
    {
        $url = (string) $this->option('url');
        $limit = (int) $this->option('limit');
        $doImport = (bool) $this->option('import');

        $this->info("Fetching: {$url}");
        $this->info($doImport ? 'Mode: IMPORT (writes to DB)' : 'Mode: DRY-RUN (no DB writes)');

        try {
            $response = Http::timeout(90)
                ->acceptJson()
                ->withHeaders(['User-Agent' => 'codeweek-eu-germany-central/1.0'])
                ->get($url);
        } catch (\Throwable $e) {
            $this->error('Fetch failed: '.$e->getMessage());

            return self::FAILURE;
        }

        if (! $response->successful()) {
            $this->error('HTTP '.$response->status());

            return self::FAILURE;
        }

        $json = $response->json();
        if (is_array($json) && isset($json['events']) && is_array($json['events']) && ! array_is_list($json)) {
            $this->error('Top-level is {"events":[...]} — importer expects a JSON array.');

            return self::FAILURE;
        }
        if (! is_array($json) || ! array_is_list($json)) {
            $this->error('Unexpected JSON shape (expected a JSON array of events).');

            return self::FAILURE;
        }

        $items = $json;
        if ($limit > 0) {
            $items = array_slice($items, 0, $limit);
        }

        $ok = 0;
        $created = 0;
        $updated = 0;
        $skipped = 0;
        $failed = 0;
        $issues = [];
        $withTags = 0;
        $withLeadingTeacher = 0;

        $technicalUser = null;
        if ($doImport) {
            $technicalUser = ImporterHelper::getTechnicalUser('codeweek-de-technical');
        }

        $bar = $this->output->createProgressBar(count($items));
        $bar->start();

        foreach ($items as $index => $item) {
            $bar->advance();

            if (! is_array($item)) {
                $skipped++;
                $issues[] = "Item {$index}: not an object";
                continue;
            }

            $rowIssues = $this->validateItem($item);
            if ($rowIssues !== []) {
                $skipped++;
                $issues[] = 'uid='.($item['uid'] ?? '?').' — '.implode('; ', $rowIssues);
                continue;
            }

            $ok++;
            if ($ok === 1 && ! $doImport) {
                $this->newLine();
                $this->line('Sample mapped attrs:');
                $this->line(json_encode($this->mapAttrs($item, $technicalUser?->id), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }

            $tags = $item['tags'] ?? [];
            if (is_array($tags) && count($tags) > 0) {
                $withTags++;
            }
            if (trim((string) ($item['leading_teacher_tag'] ?? '')) !== '') {
                $withLeadingTeacher++;
            }

            if (! $doImport) {
                continue;
            }

            try {
                $result = $this->upsertEvent($item, $technicalUser->id);
                if ($result === 'created') {
                    $created++;
                } else {
                    $updated++;
                }
            } catch (\Throwable $e) {
                $failed++;
                $issues[] = 'uid='.($item['uid'] ?? '?').' — save failed: '.$e->getMessage();
            }
        }

        $bar->finish();
        $this->newLine(2);

        $this->table(
            ['Metric', 'Value'],
            [
                ['Mode', $doImport ? 'import' : 'dry-run'],
                ['Items inspected', count($items)],
                ['Valid', $ok],
                ['Created', $doImport ? $created : 'n/a'],
                ['Updated', $doImport ? $updated : 'n/a'],
                ['Skipped (validation)', $skipped],
                ['Failed (save)', $doImport ? $failed : 'n/a'],
                ['With tags', $withTags],
                ['With leading_teacher_tag', $withLeadingTeacher],
            ]
        );

        if ($issues !== []) {
            $this->warn('Issues (showing up to 25):');
            foreach (array_slice($issues, 0, 25) as $issue) {
                $this->line(' - '.$issue);
            }
            if (count($issues) > 25) {
                $this->line(' ... and '.(count($issues) - 25).' more');
            }
        } else {
            $this->info($doImport ? 'Import finished with no issues.' : 'No contract issues found. Feed looks ready.');
        }

        return ($skipped > 0 || $failed > 0) ? self::FAILURE : self::SUCCESS;
    }

    private function validateItem(array $item): array
    {
        $rowIssues = [];

        if (empty($item['uid']) || ! isset($item['user'])) {
            $rowIssues[] = 'missing uid or user';
        }
        if (isset($item['uid']) && ! is_numeric($item['uid'])) {
            $rowIssues[] = 'uid is not numeric';
        }

        $user = $item['user'] ?? null;
        if (! is_array($user)) {
            $rowIssues[] = 'user is not an object';
        } else {
            if (empty(trim((string) ($user['email'] ?? '')))) {
                $rowIssues[] = 'user.email empty';
            }
            $userType = $user['type']['identifier'] ?? (is_string($user['type'] ?? null) ? $user['type'] : null);
            if ($userType === null || trim((string) $userType) === '') {
                $rowIssues[] = 'user.type.identifier missing';
            }
        }

        if (empty($item['type']['identifier'] ?? null)) {
            $rowIssues[] = 'type.identifier missing';
        }

        foreach (['title', 'description', 'organizer'] as $required) {
            if (empty(trim((string) ($item[$required] ?? '')))) {
                $rowIssues[] = "{$required} empty";
            }
        }

        foreach (['eventStartDate', 'eventEndDate'] as $dateKey) {
            $v = $item[$dateKey] ?? null;
            if (! is_string($v) || ! preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $v)) {
                $rowIssues[] = "{$dateKey} invalid";
            }
        }

        $tags = $item['tags'] ?? [];
        if (is_array($tags)) {
            foreach ($tags as $tag) {
                if (! is_array($tag) || ! array_key_exists('title', $tag)) {
                    $rowIssues[] = 'tags[] must be objects with title';
                    break;
                }
            }
        } elseif ($tags !== null) {
            $rowIssues[] = 'tags must be an array';
        }

        return $rowIssues;
    }

    private function mapAttrs(array $item, ?int $creatorId): array
    {
        $lat = isset($item['latitude']) && is_numeric($item['latitude']) ? (float) $item['latitude'] : null;
        $lng = isset($item['longitude']) && is_numeric($item['longitude']) ? (float) $item['longitude'] : null;
        $leading = trim((string) ($item['leading_teacher_tag'] ?? ''));
        $cw4all = trim((string) ($item['codeweek_for_all_participation_code'] ?? ''));
        $ages = is_array($item['ages'] ?? null)
            ? array_values(array_intersect($item['ages'], Event::AGES))
            : null;

        $duration = $item['duration'] ?? null;
        if ($duration !== null && ! in_array($duration, Event::DURATIONS, true)) {
            $duration = null;
        }

        $activityFormat = $item['activity_format'] ?? null;
        if (is_string($activityFormat) && in_array($activityFormat, Event::ACTIVITY_FORMATS, true)) {
            $activityFormat = [$activityFormat];
        } elseif (! is_array($activityFormat)) {
            $activityFormat = null;
        } else {
            $activityFormat = array_values(array_intersect($activityFormat, Event::ACTIVITY_FORMATS));
        }

        return [
            'status' => 'APPROVED',
            'title' => htmlspecialchars_decode((string) $item['title']),
            'slug' => Str::slug((string) $item['title']),
            'organizer' => (string) $item['organizer'],
            'description' => (string) $item['description'],
            'organizer_type' => (string) ($item['user']['type']['identifier'] ?? ($item['user']['type'] ?? 'other')),
            'activity_type' => (string) ($item['type']['identifier'] ?? 'invite-in-person'),
            'location' => (string) ($item['location'] ?? ''),
            'event_url' => (string) ($item['user']['www'] ?? ''),
            'contact_person' => (string) ($item['user']['publicEmail'] ?? ''),
            'user_email' => (string) ($item['user']['email'] ?? ''),
            'creator_id' => $creatorId,
            'country_iso' => strtoupper(trim((string) ($item['country'] ?? 'DE'))) ?: 'DE',
            'picture' => $item['photo'] ?? null,
            'language' => strtolower(trim((string) ($item['language'] ?? 'de'))) ?: 'de',
            'start_date' => $item['eventStartDate'],
            'end_date' => $item['eventEndDate'],
            'latitude' => $lat ?? 0.0,
            'longitude' => $lng ?? 0.0,
            'geoposition' => ($lat !== null && $lng !== null) ? "{$lat},{$lng}" : '',
            'participants_count' => isset($item['participants_count']) ? (int) $item['participants_count'] : null,
            'males_count' => isset($item['males_count']) ? (int) $item['males_count'] : null,
            'females_count' => isset($item['females_count']) ? (int) $item['females_count'] : null,
            'other_count' => isset($item['other_count']) ? (int) $item['other_count'] : null,
            'is_extracurricular_event' => (bool) ($item['is_extracurricular_event'] ?? false),
            'is_standard_school_curriculum' => (bool) ($item['is_standard_school_curriculum'] ?? false),
            'is_use_resource' => (bool) ($item['is_use_resource'] ?? false),
            'duration' => $duration,
            'activity_format' => $activityFormat,
            'ages' => $ages,
            'leading_teacher_tag' => $leading !== '' ? $leading : null,
            'codeweek_for_all_participation_code' => $cw4all !== '' ? $cw4all : 'cw-codeweek-de',
            'mass_added_for' => 'API codeweek_de',
            'source_ref' => self::FEED_KEY.':'.(int) $item['uid'],
            'source_synced_at' => now(),
        ];
    }

    private function upsertEvent(array $item, int $fallbackCreatorId): string
    {
        $sourceRef = self::FEED_KEY.':'.(int) $item['uid'];
        $email = trim((string) ($item['user']['email'] ?? ''));

        $user = User::where('email', $email)->first();
        if (! $user) {
            $user = User::create([
                'email' => $email,
                'firstname' => (string) ($item['organizer'] ?? 'Codeweek DE'),
                'lastname' => '',
                'username' => Str::slug((string) ($item['organizer'] ?? 'codeweek-de')).'-'.(int) $item['uid'],
                'password' => bcrypt(Str::random()),
            ]);
        }

        $attrs = $this->mapAttrs($item, $user->id ?: $fallbackCreatorId);
        $attrs['creator_id'] = $user->id;

        $event = Event::where('source_ref', $sourceRef)->first();
        $created = false;

        if (! $event) {
            $created = true;
            $event = new Event($attrs);
            $event->pub_date = now();
            $event->created = now();
            $event->updated = now();
            $event->save();
        } else {
            $attrs['updated'] = now();
            // Keep existing picture if incoming is empty
            if (empty($attrs['picture']) && ! empty($event->picture)) {
                unset($attrs['picture']);
            }
            $event->fill($attrs);
            $event->save();
        }

        $audienceIds = array_values(array_filter(
            array_map('intval', Arr::pluck($item['audience'] ?? [], 'identifier')),
            fn ($id) => $id > 0 && $id <= 100
        ));
        $validAudienceIds = \App\Audience::whereIn('id', array_unique($audienceIds))->pluck('id')->all();
        $event->audiences()->sync($validAudienceIds);

        $themeIds = $this->validateThemes(Arr::pluck($item['themes'] ?? [], 'identifier'));
        $event->themes()->sync($themeIds);

        $tagIds = [];
        foreach (Arr::pluck($item['tags'] ?? [], 'title') as $name) {
            $name = trim((string) $name);
            if ($name === '') {
                continue;
            }
            $tag = Tag::firstOrCreate(['name' => $name], ['slug' => Str::slug($name)]);
            $tagIds[] = $tag->id;
        }
        $event->tags()->sync(array_unique($tagIds));

        return $created ? 'created' : 'updated';
    }

    private function validateThemes(array $themeIds): array
    {
        $themeIds = array_unique(array_filter(array_map(
            fn ($id) => is_numeric($id) ? (int) $id : null,
            $themeIds
        )));

        $themeIdMapping = [
            7 => 6,
            10 => 9,
            12 => 1,
            15 => 16,
        ];

        $mapped = array_map(fn ($id) => $themeIdMapping[$id] ?? $id, $themeIds);

        return Theme::whereIn('id', $mapped)->pluck('id')->all();
    }
}
