<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        //return parent::toArray($request);

        return [
            'title' => $this->title,
            'description' => $this->description,
            'picture' => $this->picture_path(),
            'path' => $this->path(),
        ];
    }
}
