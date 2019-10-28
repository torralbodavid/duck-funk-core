<?php

namespace Torralbodavid\DuckFunkCore\Http\Traits;

use Torralbodavid\DuckFunkCore\Http\RCON\RCONSocket;

trait RCONConnection
{
    /**
     * Send a alert to a online user.
     * @param string $message
     * @param int $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public static function alertUser(string $message = 'Please, configure a message first', int $user_id = 2)
    {
        return (new RCONSocket([
            'key'   => 'AlertUser',
            'data'  => [
                'message'   => $message,
                'user_id'   => $user_id,
            ],
        ]))->run();
    }
}
