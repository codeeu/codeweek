<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArcgisController extends Controller
{
    public function candidates(Request $request)
    {
        $response = Http::get('https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/suggest?f=json&text=' . $request->get('search'));

        return ($response->json("suggestions"));
    }

    public function selectedAddress(Request $request){
        $address = $request->get('text');
        $magicKey = $request->get('magicKey');
        $response = Http::get("https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/findAddressCandidates?f=json&singleLine={$address}&magicKey={$magicKey}&outFields=Country");
        return $response;
    }

}
