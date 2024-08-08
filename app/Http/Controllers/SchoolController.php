<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolController extends Controller
{
    /**
     * EventController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $schools = School::paginate(10);

        return view('school.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('school.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): View
    {

        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
        ], [
            'name.required' => 'school.required.name',
            'location.required' => 'school.required.location',

        ]);

        $school = School::create($request->toArray());
        $school->users()->attach(auth()->id());

        return view('school.thankyou', compact('school'));
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school): View
    {
        return view('school.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }
}
