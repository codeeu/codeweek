<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;

class UnsubscribeController extends Controller
{
    public function index($email, $magic)
    {


        $executed = RateLimiter::attempt(
            'send-message:' . $email,
            $perMinute = 1,
            function () use ($magic, $email) {
                $user = User::where('email', $email)->where('magic_key', $magic)->first();

                if (is_null($user)) {
                    // The current user / magic combination does not match
                    return 'no';
//                    abort(403, "Your unsubscription token has expired. <br/>You can always unsubscribe from your <a href=\"https://codeweek.eu/profile\">profile</a> page");
                } else {
                    $user->unsubscribe();
                }

            }
        );

        if (!$executed) {
            return 'Too Many Requests ! Please retry later.';
        }

        if ($executed == 'no'){
            abort(403, "Your unsubscription token has expired. <br/>You can always unsubscribe from your <a href=\"https://codeweek.eu/profile\">profile</a> page");
        }

        return view('unsubscribed');

    }
}
