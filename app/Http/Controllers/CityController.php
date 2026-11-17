<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * List cities for a country (profile city dropdown).
     */
    public function index(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'country_iso' => 'required|string|size:2',
        ]);

        $cities = City::query()
            ->where('country_iso', strtoupper($validated['country_iso']))
            ->select(['id', 'city', 'country_iso'])
            ->orderBy('city')
            ->get();

        return response()->json($cities);
    }
}
