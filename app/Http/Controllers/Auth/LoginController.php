<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
     */
    public function redirectToProvider($provider): Response
    {

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     */
    public function handleProviderCallback($provider): RedirectResponse
    {
        //        if ('twitter' == $provider){
        $socialUser = Socialite::driver($provider)->user();
        //        } else{
        //            $socialUser = Socialite::driver($provider)->stateless()->user();
        //        }

        $this->loginUser($provider, $socialUser);

        return redirect()->intended('/');

    }

    /**
     * @return mixed
     */
    public function loginUser($provider, $socialUser)
    {
        $user = \App\User::where(['email' => $socialUser->getEmail()])->first();

        if (is_null($socialUser->getEmail())) {
            //        if ($socialUser->getEmail() == 'alainvd@gmail.com'){
            Log::info('Null email detected');
            Log::info(print_r($socialUser, true));
            $admin = config('codeweek.administrator');
            Mail::to($admin)->send(new \App\Mail\WarningEmail(print_r($socialUser, true)));
            abort(500);
        }

        if ($user == null) {
            //Create user
            $user = \App\User::create(
                [
                    'email' => $socialUser->getEmail(),
                    //'avatar' => $socialUser->getAvatar(),
                    'firstname' => ($socialUser->getName()) ? $socialUser->getName() : $socialUser->getNickName(),
                    'lastname' => '',
                    'provider' => $provider,
                    'magic_key' => random_int(1000000, 2000000) * random_int(1000, 2000),
                ]);

        } else {
            //update user
            $user->provider = $provider;
            $user->updated_at = Carbon::now();
            $user->save();
        }

        //login with user
        Auth::login($user, true);
    }
}
