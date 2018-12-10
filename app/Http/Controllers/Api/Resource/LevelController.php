<?php

namespace App\Http\Controllers\Api\Resource;

use App\ResourceLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'label' => ['required']
        ]);

        return ResourceLevel::create($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ResourceLevel  $resourceLevel
     * @return \Illuminate\Http\Response
     */
    public function show(ResourceLevel $resourceLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ResourceLevel  $resourceLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(ResourceLevel $resourceLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResourceLevel  $resourceLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResourceLevel $resourceLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResourceLevel  $resourceLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResourceLevel $resourceLevel)
    {
        //
    }
}
