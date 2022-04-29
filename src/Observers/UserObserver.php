<?php

namespace Torralbodavid\DuckFunkCore\Observers;

use Torralbodavid\DuckFunkCore\Models\Arcturus\User;
use Torralbodavid\DuckFunkCore\Models\Arcturus\UserSettings;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        $settings = new UserSettings();
        $settings->user_id = $user->id;
        $settings->welcome_flow_enabled = config('duck-funk.welcome_enabled');
        $settings->welcome_flow_step = 1;
        $settings->allow_name_change = '1';
        $settings->can_change_name = '1';
        $settings->save();
    }
}
