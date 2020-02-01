<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

use Illuminate\Routing\Controller;

use Laravel\Socialite\Facades\Socialite;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

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
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $user = User::firstOrCreate(
        ['username' => User::randomNickname()],
        [
            'username' => User::randomNickname(),
            'real_name' => $user->getName(),

        ]
        );

    }
}
