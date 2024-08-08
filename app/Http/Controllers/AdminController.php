<?php

namespace App\Http\Controllers;

use App\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    public function activities(): View
    {

        $activities = Activity::orderBy('id', 'DESC')->paginate(20);

        return view('activities', compact('activities'));

    }

    public function certificates(): View
    {

        return view('admin.certificates');

    }

    public function generateCertificates(Request $request): View
    {

        $names = $request->get('names');

        $exploded = explode(',', $names);

        $trimmed = array_map('trim', $exploded);

        $results = [];
        //For each person, we will generate a certificate.
        foreach ($trimmed as $name) {
            $event = make(\App\Event::class, [
                'id' => 0,
                'name_for_certificate' => $name,
            ]);
            $s3path = (new Certificate($event))->generate();
            $results[] = [
                'name' => $name,
                'path' => $s3path,
            ];

        }

        // Log::info($results);

        return view('admin.certificates', compact('results'));

    }
}
