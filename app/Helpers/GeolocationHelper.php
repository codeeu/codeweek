<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class GeolocationHelper {
    public static function getCoordinates($location) {
        $response = Http::get(
            'https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/suggest',
            [
                'f' => 'json',
                'text' => $location
            ]
        );

        $suggestions = $response->collect();
        if (empty($suggestions['suggestions'])) {
            return null;
        }

        $text = $suggestions['suggestions'][0]['text'];
        $magicKey = $suggestions['suggestions'][0]['magicKey'];

        $candidates = Http::get(
            'https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/findAddressCandidates',

            [
                'SingleLine' => $text,
                'magicKey' => $magicKey,
                'outFields' => 'Country',
                'f' => 'json'
            ]
        );

        $candidate = $candidates->collect()['candidates'][0];

        return $candidate;
    }
}
