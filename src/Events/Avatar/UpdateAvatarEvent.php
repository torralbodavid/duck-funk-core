<?php

namespace Torralbodavid\DuckFunkCore\Events\Avatar;

use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Torralbodavid\DuckFunkCore\Http\Request\Request;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class UpdateAvatarEvent
{
    use SerializesModels;

    public $request;

    /**
     * Create a new event instance.
     *
     * @param array $request
     */
    public function __construct(array $request)
    {
        $this->request = $request;
    }
}
