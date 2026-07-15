<?php

namespace App\Services;

use App\Services\Support\SupportEmailAddress;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class SocialUserLoginService
{
    /**
     * Find or create a local user for an OAuth login.
     *
     * Looks up by stable provider ID first so a changed login email does not
     * cause a duplicate account when the provider still returns the old address.
     */
    public function resolveOrCreateUser(string $provider, SocialiteUser $socialUser): User
    {
        $providerId = (string) $socialUser->getId();
        $oauthEmail = SupportEmailAddress::normalize((string) $socialUser->getEmail());

        $user = User::query()
            ->where('provider', $provider)
            ->where('provider_id', $providerId)
            ->first();

        if ($user === null && $oauthEmail !== null) {
            $user = User::query()
                ->whereRaw('LOWER(email) = ?', [$oauthEmail])
                ->first();
        }

        if ($user === null) {
            return User::create([
                'email' => $oauthEmail,
                'password' => bcrypt(Str::random()),
                'firstname' => $socialUser->getName() ?: $socialUser->getNickname(),
                'lastname' => '',
                'username' => $socialUser->getNickname() ?: '',
                'provider' => $provider,
                'provider_id' => $providerId,
                'magic_key' => random_int(1000000, 2000000) * random_int(1000, 2000),
                'email_verified_at' => Carbon::now(),
            ]);
        }

        $user->provider = $provider;
        $user->provider_id = $providerId;
        $user->email_verified_at = Carbon::now();
        $user->save();

        return $user;
    }
}
