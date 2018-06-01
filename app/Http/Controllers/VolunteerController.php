<?php

namespace App\Http\Controllers;

use App\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteers = Volunteer::all();
        return view('volunteer.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('volunteer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Volunteer::firstOrCreate(['user_id' => auth()->user()->id]);


        return redirect()->route('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Volunteer $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Volunteer $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Volunteer $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Volunteer $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        //
    }

    public function approve(Volunteer $volunteer)
    {

        $volunteer->user->removeRole('ambassador');

        $volunteer->update(['status' => 'APPROVED','approved_by' => auth()->user()->id]);

        $volunteer->user->assignRole('ambassador');

        return redirect()->route('volunteers');

    }

    public function reject(Volunteer $volunteer)
    {
        $volunteer->user->removeRole('ambassador');

        $volunteer->update(['status' => 'REJECTED','approved_by' => auth()->user()->id]);

        return redirect()->route('volunteers');
    }
}
