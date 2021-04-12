<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;

class HackathonsVotingController extends Controller
{
    public function save(Request $request){


        $validated = $request->validate([
            "country" => "required",
            "choice" => "required"
        ]);

        //dd($validated);

        $vote = Vote::create([
            "country" => $validated['country'],
            "choice" => $validated['choice'],
            "session" => session()->getId()
        ]);


        return redirect()->back()->with('success', 'thanks for voting');
        //return back();
    }
}
