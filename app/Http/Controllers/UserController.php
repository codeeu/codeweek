<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(){

        $user = auth()->user();


        $user->update(request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'country_iso' => 'nullable',
            'twitter' => 'nullable',
            'website' => 'nullable',
            'bio' => 'nullable'
        ]));

        return back()->with('flash', 'Your profile has been modified!');;
    }
}
