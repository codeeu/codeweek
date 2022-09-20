<?php
//
//namespace App\Http\Controllers;
//
//use App\Exports\VotesExport;
//use App\Vote;
//use Illuminate\Http\Request;
//use Maatwebsite\Excel\Facades\Excel;
//
//class HackathonsVotingController extends Controller
//{
//    public function save(Request $request){
//
//
//        $validated = $request->validate([
//            "country" => "required",
//            "choice" => "required"
//        ]);
//
//        //dd($validated);
//
//        $vote = Vote::create([
//            "country" => $validated['country'],
//            "choice" => $validated['choice'],
//            "session" => session()->getId()
//        ]);
//
//
//        return redirect()->back()->with('success', 'thanks for voting');
//        //return back();
//    }
//
//    public function results(Request $request)
//    {
//        return Excel::download(new VotesExport(), 'votes.xlsx');
//
//    }
//}
