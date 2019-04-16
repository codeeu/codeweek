<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ToolkitsController extends Controller
{
    public function get(){


        $languages = explode(",",env("LOCALES"));

        $locale = App::getLocale();


        $leaflets = [
            "en"=>[
                "url"=>"https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/leaflet/2019/Codeweek_2019_EN.pdf"
            ],
            "fr"=>[
                "url"=>"https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/leaflet/2019/Codeweek_2019_FR.pdf"
            ]

        ];

        return view('toolkits', compact(['languages','locale']));
    }
}
