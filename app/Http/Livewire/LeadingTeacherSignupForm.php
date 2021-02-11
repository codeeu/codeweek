<?php

namespace App\Http\Livewire;

use App\Audience;
use App\City;
use App\Country;
use App\LeadingTeacherExpertise;
use App\ResourceLevel;
use App\ResourceSubject;
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
    public $subjects;
    public $expertises;
    public $city;
    public $twitter;
    public $message;
    public $privacy;
    public $isLeadingTeacher;
    public $selectedSubjects = null;
    public $selectedExpertises = null;
    public $selectedLevels = null;

    public function mount()
    {
        $countries = \App\Country::all()->sortBy('name');
        $levels = ResourceLevel::whereTeach(true)->get();
        $subjects = ResourceSubject::orderBy('position')->get();


        //dd($levels);
//
//        $levels = [
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
//        ];

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

        $expertises = LeadingTeacherExpertise::orderBy('position')->get();


        $this->countries = $countries;

//        $this->cities = $cities;
        $this->levels = $levels;
        $this->subjects = $subjects;
        $this->expertises = $expertises;
        $this->privacy = auth()->user()->privacy === 1;
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
        'selectedLevels' => 'required',
        'selectedSubjects' => 'required',
        'selectedExpertises' => 'required',
        'isLeadingTeacher' => 'accepted',
        'privacy' => 'accepted',

    ];

    public function submit()
    {

        $this->validate();

        $user = auth()->user();
        $user->assignRole('leading teacher');
        $user->expertises()->attach($this->selectedExpertises);
        $user->levels()->attach($this->selectedLevels);
        $user->subjects()->attach($this->selectedSubjects);
        $user->firstname = $this->first_name;
        $user->lastname = $this->last_name;
        $user->twitter = $this->twitter;
        $user->privacy = true;

        $user->save();

//        dd($user->expertises()->count());


        return redirect()->to('/leading-teachers/success');





    }
}
