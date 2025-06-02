<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Event;

class TestLatestEvent extends Command
{
    protected $signature = 'test:latest-event';
    protected $description = 'Print all fields of the latest imported Event';

    public function handle(): void
    {
        $event = Event::latest()->first();

        if (! $event) {
            $this->error('❌ No event found.');
            return;
        }

        $this->info("✅ Latest Event: {$event->title} (ID: {$event->id})\n");

        $fields = [
            'title' => $event->title,
            'slug' => $event->slug,
            'organizer' => $event->organizer,
            'description' => $event->description,
            'country_iso' => $event->country_iso,
            'language' => $event->language,
            'location' => $event->location,
            'start_date' => $event->start_date,
            'end_date' => $event->end_date,
            'event_url' => $event->event_url,
            'user_email' => $event->user_email,
            'creator_id' => $event->creator_id,
            'longitude' => $event->longitude,
            'latitude' => $event->latitude,
            'geoposition' => $event->geoposition,
            'picture' => $event->picture,
            'activity_type' => $event->activity_type,
            'activity_format' => $event->activity_format,
            'duration' => $event->duration,
            'recurring_event' => $event->recurring_event,
            'recurring_type' => $event->recurring_type,
            'males_count' => $event->males_count,
            'females_count' => $event->females_count,
            'other_count' => $event->other_count,
            'is_extracurricular_event' => $event->is_extracurricular_event,
            'is_standard_school_curriculum' => $event->is_standard_school_curriculum,
            'is_use_resource' => $event->is_use_resource,
            'ages' => $event->ages,
            'audiences' => $event->audiences()->pluck('id')->toArray(),
            'themes' => $event->themes()->pluck('id')->toArray(),
            'created_at' => $event->created_at,
            'updated_at' => $event->updated_at,
            'status' => $event->status,
        ];

        foreach ($fields as $key => $value) {
            $pretty = is_array($value) ? json_encode($value) : (string) $value;
            $this->line("• {$key}: {$pretty}");
        }

        $this->info("\n✅ Done.\n");
    }
}
