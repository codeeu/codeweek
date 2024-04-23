<?php

namespace App\Http\Controllers;

use App\Audience;
use App\City;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadingTeachersSignup extends Controller
{
    public function index(): View
    {
        //        $countries = \App\Country::all()->sortBy('name');
        //        $levels = Audience::all();
        //
        //        //dd($levels);
        //
        //        $levels = collect([
        //            [
        //                "id" => "Pre-primary",
        //                "name" => "Pre-primary"
        //            ], [
        //                "id" => "Primary",
        //                "name" => "Primary"
        //            ], [
        //                "id" => "Lower Secondary",
        //                "name" => "Lower Secondary"
        //            ], [
        //                "id" => "Upper Secondary",
        //                "name" => "Upper Secondary"
        //            ], [
        //                "id" => "Tertiary",
        //                "name" => "Tertiary"
        //            ], [
        //                "id" => "Other",
        //                "name" => "Other"
        //            ],
        //
        //        ]);
        //
        //        $countries = Country::whereIn("iso", [
        //            "AL", "AT", "BE", "BA", "BG",
        //            "HR", "CY", "CZ", "DK", "EE",
        //            "FI", "FR", "DE", "GR", "HU",
        //            "IN", "IE", "IL", "IT", "XK",
        //            "LV", "LT", "LU", "MT", "ME",
        //            "NL", "MK", "NO", "PL", "PT",
        //            "RO", "RS", "SK", "SI", "ES",
        //            "SE", "TN", "GB"
        //        ])->orderBy("name")->get();
        //
        //        $cities = City::whereIn("country_iso", [
        //            "AL", "AT", "BE", "BA", "BG",
        //            "HR", "CY", "CZ", "DK", "EE",
        //            "FI", "FR", "DE", "GR", "HU",
        //            "IN", "IE", "IL", "IT", "XK",
        //            "LV", "LT", "LU", "MT", "ME",
        //            "NL", "MK", "NO", "PL", "PT",
        //            "RO", "RS", "SK", "SI", "ES",
        //            "SE", "TN", "GB"
        //        ])
        //
        //        ->get()
        //            ->sortBy([
        //                ["country","asc"],
        //                ["city","asc"]
        //            ])
        //        ;

        //        dd($cities);

        return view('leading-teachers.signup-form');
    }

    public function store(Request $request): View
    {
        //        $validated = $this->validate($request, [
        //            'first_name' => 'required',
        //            'last_name' => 'required',
        //            'country' => 'required|filled',
        //            'city' => 'required|filled',
        //            'twitter' => 'present',
        //            'levels' => 'required'
        //        ]);
        //
        //        $user = auth()->user();
        //        $user->assignRole('leading teacher');
        //
        //        dd($validated);

        return view('leading-teachers.signup-form-success');
    }
}
