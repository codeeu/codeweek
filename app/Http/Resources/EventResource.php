<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'picture' => $this->picture_path(),
            'path' => $this->path(),
            'geoposition' => $this->geoposition,
            'location' => $this->location,
            'activity_type' => $this->activity_type,
            'organizer' => $this->organizer,
            'organizer_type' => $this->organizer_type,
            'event_url' => $this->event_url,
            'contact_person' => $this->contact_person,
            'language' => $this->language,
            'languages' => $this->languages,
            'imported_from_german_feeds' => $this->imported(),
            'codeweek_for_all_participation_code' => $this->codeweek_for_all_participation_code,
            'themes' => ThemeResource::collection($this->themes),
            'audiences' => ThemeResource::collection($this->audiences),
            'tags' => ThemeResource::collection($this->tags),
            'owner' => new UserResource($this->owner),
            'url' => $this->url,
        ];
    }
}
