<?php

namespace App\Livewire;

use App\City;
use App\Country;
use App\LeadingTeacherExpertise;
use App\ResourceLevel;
use App\ResourceSubject;
use Livewire\Component;

class LeadingTeacherSignupForm extends Component
{
    public $countries;

    public $closestCity;

    public $cities = [];

    public $levels;

    public $email;

    public $first_name;

    public $last_name;

    public $selectedCountry;

    public $subjects;

    public $expertises;

    public $selectedCity;

    public $twitter;

    public $tag;

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

        $countries = Country::whereIn('iso', [
            'AL', 'AT', 'BE', 'BA', 'BG',
            'HR', 'CY', 'CZ', 'DK', 'EE',
            'FI', 'FR', 'DE', 'GR', 'HU',
            'IN', 'IE', 'IL', 'IT', 'XK',
            'LV', 'LT', 'LU', 'MT', 'ME',
            'NL', 'MK', 'NO', 'PL', 'PT',
            'RO', 'RS', 'SK', 'SI', 'ES',
            'SE', 'TN', 'GB',
        ])->orderBy('name')->get();

        $expertises = LeadingTeacherExpertise::orderBy('position')->get();

        $this->countries = $countries;

        $this->levels = $levels;
        $this->subjects = $subjects;
        $this->expertises = $expertises;
        $this->privacy = auth()->user()->privacy === 1;
        $this->email = auth()->user()->email;

        $location = geoip(geoip()->getClientIP());

        if (! is_null($location)) {
            $this->closestCity = City::getClosestCity($location->lon, $location->lat);
            if ($this->closestCity) {
                $this->selectedCity = $this->closestCity->id;
                $this->selectedCountry = $this->closestCity->country_iso;
            }
        }

    }

    public function render()
    {

        if ($this->selectedCountry) {
            $cities = City::where('country_iso', '=', $this->selectedCountry)
                ->get()
                ->sortBy([
                    ['city', 'asc'],
                ]);
            $this->cities = $cities;
        }

        return view('livewire.leading-teacher-signup-form');
    }

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'selectedCountry' => 'required|filled',
        'selectedCity' => 'required|filled',
        'twitter' => 'nullable|regex:/^(\@)?([a-z0-9_]{5,15})$/i',
        'selectedLevels' => 'required',
        'selectedSubjects' => 'required',
        'selectedExpertises' => 'required',
        'isLeadingTeacher' => 'accepted',
        'privacy' => 'accepted',
        'tag' => 'required',

    ];

    public function submit()
    {

        $this->validate();

        $user = auth()->user();

        $user->levels()->detach();
        $user->subjects()->detach();
        $user->expertises()->detach();

        $user->levels()->attach($this->selectedLevels);
        $user->subjects()->attach($this->selectedSubjects);
        $user->expertises()->attach($this->selectedExpertises);
        $user->firstname = $this->first_name;
        $user->lastname = $this->last_name;
        $user->twitter = $this->twitter;
        $user->privacy = true;
        $user->tag = $this->tag;
        $user->city_id = $this->selectedCity;
        $user->country_iso = $this->selectedCountry;

        $user->save();

        $user->assignRole('leading teacher');

        return redirect()->to('/leading-teachers/success');

    }
}
