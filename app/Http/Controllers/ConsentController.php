<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsentController extends Controller
{
    public function show()
    {
        return view('consent');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($request->input('consent1') === '1') {
            //$user->consent_given_at = now();
            $user->giveConsent();
            if ($request->input('consent2') === '1') {
                $user->giveFutureConsent();
            }

            return redirect()->route('home');
        }

        Auth::logout();
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

