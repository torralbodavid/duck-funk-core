<?php

namespace Torralbodavid\DuckFunkCore\Events\Avatar;

use Illuminate\Queue\SerializesModels;
use Torralbodavid\DuckFunkCore\Http\Request\Request;

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
