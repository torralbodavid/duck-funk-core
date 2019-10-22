<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers;

class TestController
{
    public function hello()
    {
        return GameController::generateSSO();
    }
}
