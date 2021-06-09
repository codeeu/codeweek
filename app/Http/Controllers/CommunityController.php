<?php

namespace App\Http\Controllers;

use App\Country;
use App\Filters\UserFilters;
use App\Helpers\AmbassadorHelper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommunityController extends Controller
{
    public function index(UserFilters $filters)
    {
        if (empty($filters->getFilters())) {

            $country_iso = optional(auth()->user())->country ? auth()->user()->country->iso : User::getGeoIPData()->iso_code;
            return redirect('community?country_iso=' . $country_iso);
        };




        $ambassadors = User::role('ambassador')->filter($filters)->whereNotNull("avatar_path")->whereNotNull("bio")->paginate(10);

        $teachers = User::role('leading teacher')->where('approved',1)->with('city')->get();

       /* foreach ($teachers as $teacher){
            Log::info($teacher);
        }*/





        return view('community')->with([
            "ambassadors" => $ambassadors,
            "countries" => Country::withEvents(),
            "countries_with_ambassadors" => AmbassadorHelper::getByActiveCountries(),
            "teachers" => $teachers,
            "country_iso" => request()->get('country_iso')
        ]);
    }
}
