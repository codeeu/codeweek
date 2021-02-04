<?php

namespace App\Http\Controllers;

use App\Audience;
use Illuminate\Http\Request;

class LeadingTeachersSignup extends Controller
{
    public function index()
    {
        $countries = \App\Country::all()->sortBy('name');
        $levels = Audience::all();

        //dd($levels);

        $levels = collect([
            [
                "id" => "Pre-primary",
                "name" => "Pre-primary"
            ],[
                "id" => "Primary",
                "name" => "Primary"
            ],[
                "id" => "Lower Secondary",
                "name" => "Lower Secondary"
            ],[
                "id" => "Upper Secondary",
                "name" => "Upper Secondary"
            ],[
                "id" => "Tertiary",
                "name" => "Tertiary"
            ],[
                "id" => "Other",
                "name" => "Other"
            ],

        ]);

//        Pre-primary, Primary, Lower Secondary, Upper Secondary, Tertiary, Other

        return view('leading-teachers.signup-form', compact(['countries', 'levels']));
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required|filled',
            'city' => 'required|filled',
            'twitter' => 'present',
            'levels' => 'required'
        ]);

        $user = auth()->user();
        $user->assignRole('leading teacher');

        dd($validated);

        return view('leading-teachers.signup-form-success');
    }
}
