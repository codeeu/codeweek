<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'picture' => $this->picture_path(),
            'path' => $this->path(),
            'geoposition' => $this->geoposition,
            'location' => $this->location,
            'activity_type' => $this->activity_type,
            'organizer' => $this->organizer,
            'organizer_type' => $this->organizer_type,
            'event_url' => $this->event_url,
            'contact_person' => $this->contact_person,
            'codeweek_for_all_participation_code' =>
                $this->codeweek_for_all_participation_code,
            'themes' => ThemeResource::collection($this->themes),
            'audiences' => ThemeResource::collection($this->audiences),
            'tags' => ThemeResource::collection($this->tags),
            'owner' => new UserResource($this->owner)
        ];
    }
}
