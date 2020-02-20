<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;
use Torralbodavid\DuckFunkCore\Models\Arcturus\UserSettings;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider()
    {
        return Socialite::with('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $user = User::firstOrCreate(
            ['mail' => $user->getEmail()],
            [
                'username' => User::randomNickname(),
                'real_name' => $user->getName(),
                'mail' => $user->getEmail(),
                'account_created' => Carbon::now()->getTimestamp(),
                'ip_register' => request()->ip(),
                'ip_current' => request()->ip(),
            ]);

        \auth()->login($user);
        return redirect()->intended('hotel');
    }
}
