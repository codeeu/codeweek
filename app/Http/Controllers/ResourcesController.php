<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function index()
    {
        $countries =
            ["austria", "belarus", "belgium", "bulgaria", "china", "croatia", "cyprus", "czech_republic", "denmark", "estonia", "finland", "france", "germany",
                "greece", "hungary", "iceland", "ireland", "isle_of_man", "italy", "kosovo", "latvia", "lithuania", "luxembourg", "malta", "moldova", "netherlands", "norway", "poland",
                "portugal", "romania", "serbia", "slovakia", "slovenia", "spain", "sweden", "switzerland", "turkey", "ukraine", "united_kingdom"];
        return view('resources.index', compact('countries'));
    }

    public function show($country)
    {
        return view("resources.{$country}.index",compact('country'));

    }
}
