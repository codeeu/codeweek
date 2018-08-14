<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.

     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $this->loginUser($provider, $socialUser);


        return redirect()->intended('/');

    }

    /**
     * @param $provider
     * @param $socialUser
     * @return mixed
     */
    public function loginUser($provider, $socialUser)
    {
        $user = \App\User::where(['email' => $socialUser->getEmail()])->first();

        if ($user == null) {
            //Create user
            $user = \App\User::create(
                [
                    'email' => $socialUser->getEmail(),
                    //'avatar' => $socialUser->getAvatar(),
                    'firstname' => ($socialUser->getName()) ? $socialUser->getName() : $socialUser->getNickName(),
                    'lastname' => '',
                    'provider' => $provider,
                ]);

        } else {
            //update user
            $user->updated_at = Carbon::now();
            $user->save();
        }

        //login with user
        Auth::login($user, true);
    }
}
