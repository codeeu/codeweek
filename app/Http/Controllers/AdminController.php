<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    public function activities()
    {

        $activities = Activity::orderBy('id','DESC')->paginate(20);
        return view('activities',compact('activities'));

    }
}
