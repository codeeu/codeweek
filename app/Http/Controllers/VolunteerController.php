<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $volunteers = Volunteer::all();

        return view('volunteer.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('volunteer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        Volunteer::firstOrCreate(['user_id' => auth()->user()->id]);

        return redirect()->route('profile');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        //
    }

    public function approve(Volunteer $volunteer): RedirectResponse
    {

        $volunteer->user->removeRole('ambassador');

        $volunteer->update(['status' => 'APPROVED', 'approved_by' => auth()->user()->id]);

        $volunteer->user->assignRole('ambassador');

        return redirect()->route('volunteers');

    }

    public function reject(Volunteer $volunteer): RedirectResponse
    {
        $volunteer->user->removeRole('ambassador');

        $volunteer->update(['status' => 'REJECTED', 'approved_by' => auth()->user()->id]);

        return redirect()->route('volunteers');
    }
}
