<?php

namespace Torralbodavid\DuckFunkCore\Events;

use Illuminate\Queue\SerializesModels;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class UserEvent
{
    use SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->$user = $user;
    }
}
