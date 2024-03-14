<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    public function activities()
    {

        $activities = Activity::orderBy('id', 'DESC')->paginate(20);
        return view('activities', compact('activities'));

    }


}
