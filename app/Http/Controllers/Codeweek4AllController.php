<?php

namespace App\Http\Controllers;

use App\Helpers\Codeweek4AllHelper;
use Carbon\Carbon;

class Codeweek4AllController extends Controller
{
    public function detail($code, $edition = null)
    {

        if (is_null($edition)) {
            $edition = Carbon::now()->subYear();
        }

        $result = Codeweek4AllHelper::getDetailsByCodeweek4All([$code], $edition)->first();
        $countries = Codeweek4AllHelper::getCountriesByCodeweek4All($code, $edition);
        $initiator = Codeweek4AllHelper::getInitiatorByCodeweek4All([$code]);

        return view('codeweek4all.detail', compact(['result', 'countries', 'initiator']));
    }
}
