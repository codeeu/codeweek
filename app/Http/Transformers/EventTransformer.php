<?php


namespace App\Http\Transformers;


class EventTransformer extends Transformer
{
    public function transform($event)
    {

        return [
            'id' => $event['id'],
            'geoposition' => $event['geoposition'],
            'country' => $event['country_iso']
        ];

    }
}