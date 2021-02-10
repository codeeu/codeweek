<?php

namespace App\Http\Livewire;

use App\Audience;
use App\City;
use App\Country;
use Livewire\Component;

class LeadingTeacherSignupForm extends Component
{

    public $countries;
    public $cities = [];
    public $levels;
    public $email;
    public $first_name;
    public $last_name;
    public $selectedCountry;
    public $city;
    public $studentLevels = null;
    public $twitter;
    public $message;

    public function mount()
    {
        $countries = \App\Country::all()->sortBy('name');
        $levels = Audience::all();


        //dd($levels);

        $levels = [
            [
                "id" => "Pre-primary",
                "name" => "Pre-primary"
            ], [
                "id" => "Primary",
                "name" => "Primary"
            ], [
                "id" => "Lower Secondary",
                "name" => "Lower Secondary"
            ], [
                "id" => "Upper Secondary",
                "name" => "Upper Secondary"
            ], [
                "id" => "Tertiary",
                "name" => "Tertiary"
            ], [
                "id" => "Other",
                "name" => "Other"
            ],

        ];

        $countries = Country::whereIn("iso", [
            "AL", "AT", "BE", "BA", "BG",
            "HR", "CY", "CZ", "DK", "EE",
            "FI", "FR", "DE", "GR", "HU",
            "IN", "IE", "IL", "IT", "XK",
            "LV", "LT", "LU", "MT", "ME",
            "NL", "MK", "NO", "PL", "PT",
            "RO", "RS", "SK", "SI", "ES",
            "SE", "TN", "GB"
        ])->orderBy("name")->get();

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
//            ->get()
//            ->sortBy([
//                ["country","asc"],
//                ["city","asc"]
//            ])
//        ;


        $this->countries = $countries;

//        $this->cities = $cities;
        $this->levels = $levels;
        $this->email = auth()->user()->email;

    }

    public function render()
    {
        return view('livewire.leading-teacher-signup-form');
    }

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'selectedCountry' => 'required|filled',
//        'city' => 'required|filled',
        'twitter' => 'present',
        'studentLevels' => 'required'
    ];

    public function submit()
    {

        $this->validate();

        $user = auth()->user();
        $user->assignRole('leading teacher');

        return redirect()->to('/leading-teachers/success');

        //dd('coucou');
        // Execution doesn't reach here if validation fails.


    }
}
