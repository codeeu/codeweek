<?php

namespace App\Http\Controllers;

use App\Podcast;
use Illuminate\Http\Request;

class PodcastsController extends Controller
{
    public function index(Request $request)
    {
        $podcasts = Podcast::active()
            ->orderBy('release_date', 'DESC')
            ->get();

        return view('podcasts', compact('podcasts'));
    }

    public function show(Podcast $podcast)
    {

        return view('podcast', compact('podcast'));
    }

    public function upcoming(Request $request)
    {
        $podcasts = Podcast::orderBy('release_date', 'DESC')->get();

        return view('podcasts-upcoming', compact('podcasts'));
    }
}
