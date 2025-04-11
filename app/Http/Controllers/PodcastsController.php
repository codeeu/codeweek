<?php

namespace App\Http\Controllers;

use App\Podcast;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PodcastsController extends Controller
{
    public function index(Request $request): View
    {
        $podcasts = Podcast::active()
            ->orderBy('release_date', 'DESC')
            ->get();

        return view('podcasts', compact('podcasts'));
    }

    public function show(Podcast $podcast): View
    {
        $latest_podcasts = Podcast::active()
            ->orderBy('release_date', 'DESC')
            ->take(5)
            ->get();

        return view('podcast', compact('podcast', 'latest_podcasts'));
    }

    public function upcoming(Request $request): View
    {
        $podcasts = Podcast::orderBy('release_date', 'DESC')->get();

        return view('podcasts-upcoming', compact('podcasts'));
    }
}
