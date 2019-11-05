<?php

namespace App\Http\Controllers;

use App\CertificateExcellence;
use App\Excellence;
use App\Helpers\ExcellenceWinnersHelper;
use App\Queries\ExcellenceQuery;
use Gate;
use Illuminate\Http\Request;


class ExcellenceWinnersController extends Controller
{

    public function list($edition = 2019)
    {

        //Get the winning CW4All codes
        $codes = ExcellenceWinnersHelper::getWinnerCodes($edition);

        $details = ExcellenceWinnersHelper::getDetailsByCodeweek4All($codes->toArray())->paginate(20);

        //dd($details);

        return view('excellence.winners', compact(['edition','details']));

    }





}
