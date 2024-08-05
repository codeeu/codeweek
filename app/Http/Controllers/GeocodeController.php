<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeocodeController extends Controller
{
    public function findAddressCandidates(Request $request)
    {
        $response = Http::get('https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/findAddressCandidates', [
            'f' => 'json',
            'singleLine' => $request->input('singleLine'),
            'magicKey' => $request->input('magicKey'),
            'outFields' => 'Country'
        ]);

        return response()->json($response->json());
    }

    public function suggest(Request $request)
    {
        $response = Http::get('https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/suggest', [
            'f' => 'json',
            'text' => $request->input('text')
        ]);

        return response()->json($response->json());
    }
}
