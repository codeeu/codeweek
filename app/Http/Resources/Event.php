<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
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
