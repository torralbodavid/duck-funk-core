<?php

namespace Torralbodavid\DuckFunkCore\Http\RCON;

use Exception;

class RCONSocket
{
    protected $socket;
    protected $command;

    /**
     * RCONSocket constructor.
     * @param array $command
     */
    public function __construct(array $command)
    {
        try {
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        } catch (Exception $exception) {
            return response()->json(
                [
                    'connection' => 'failed',
                    'error'   => $exception->getMessage(),
                ]
            );
        }

        if ($socket === false) {
            return response()->json(
                [
                    'connection' => 'failed',
                    'error'   => socket_strerror(socket_last_error()),
                ]
            );
        }

        try {
            $result = socket_connect($socket, config('duck-funk.host_rcon'), config('duck-funk.port_rcon'));
        } catch (Exception $exception) {
            return response()->json(
              [
                  'connection' => 'failed',
                  'error'   => $exception->getMessage(),
              ]
            );
        }

        if ($result === false) {
            return response()->json(
                [
                    'connection' => 'failed',
                    'error'   => 'The socket connection does not exist',
                ]
            );
        }

        $command['auth_key'] = config('duck-funk.auth_key_rcon');
        $this->command = json_encode($command);
        $this->socket = $socket;
    }

    public function run()
    {
        try {
            $this->sendCommand();
            $this->checkCommandReceived();
            $this->destruct();
        } catch (Exception $exception) {
            return response()->json(
                [
                    'connection' => 'failed',
                    'error'   => $exception->getMessage(),
                ]
            );
        }

        return response()->json(
            [
                'connection' => 'success',
            ]
        );
    }

    private function sendCommand()
    {
        if (socket_write($this->socket, $this->command, strlen($this->command)) === false) {
            echo socket_strerror(socket_last_error($this->socket));

            return false;
        } else {
            return true;
        }
    }

    private function checkCommandReceived()
    {
        return socket_read($this->socket, strlen($this->command));
    }

    private function destruct()
    {
        socket_close($this->socket);
    }
}
