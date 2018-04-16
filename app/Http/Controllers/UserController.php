<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(){

        $user = auth()->user();


        $user->update(request()->validate([
            'name' => 'required'
        ]));

        return back()->with('flash', 'Your user has been modified!');;
    }
}
