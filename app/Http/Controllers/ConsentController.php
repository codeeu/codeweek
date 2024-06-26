<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('consent');
    }

    public function store(Request $request)
    {
        \Log::info('Consent store method called');
        $user = Auth::user();
        $user->giveConsent();

        return redirect()->route('home');
    }

    public function logout()
    {
        //Auth::logout();
        \Log::info('Consent logout method called');
        return redirect('/login');
    }
}
