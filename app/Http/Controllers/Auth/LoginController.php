<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialUserLoginService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function __construct(
        private readonly SocialUserLoginService $socialUserLoginService,
    ) {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request): void
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string|max:72',
        ]);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     */
    public function redirectToProvider($provider): RedirectResponse
    {

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     */
    public function handleProviderCallback($provider): RedirectResponse
    {
        $allowed_providers = ['twitter', 'github', 'google', 'facebook'];

        if (in_array($provider, $allowed_providers)) {
            $socialUser = Socialite::driver($provider)->user();

            $this->loginUser($provider, $socialUser);
        }
        return redirect()->intended('/');

    }

    /**
     * @return mixed
     */
    public function loginUser($provider, $socialUser)
    {
        if (is_null($socialUser->getEmail())) {
            Log::info('Null email detected');
            Log::info(print_r($socialUser, true));
            $admin = config('codeweek.administrator');
            Mail::to($admin)->send(new \App\Mail\WarningEmail(print_r($socialUser, true)));
            abort(500);
        }

        $user = $this->socialUserLoginService->resolveOrCreateUser($provider, $socialUser);

        Auth::login($user, true);
    }
}
