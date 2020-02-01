<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\API\Welcome;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Torralbodavid\DuckFunkCore\Http\Request\UserRequest;

class WelcomeController extends Controller
{
    public function check(UserRequest $request)
    {
        $validated = $request->validated();

        return response()->json([
            'code' => 'OK',
            'validationResult' => null,
            'suggestions' => [],
        ]);
    }

    public function select(Request $request)
    {
        // name	backend1

        /*return response()->json([
            'error' => 'name_change.not_allowed'
        ]);*/

        return response()->json([
            'code' => 'OK',
            'validationResult' => null,
            'suggestions' => [],
        ]);
    }

    public function save(Request $request)
    {
        /*
         * figure	sh-290-74.lg-275-84.hr-110-38.ch-3030-85.hd-190-1
         * gender	m
         */

        return response()->json([
            'uniqueId' => 123,
            'name' => 'ddd,d',
            'figureString' => 'hr-110-38.hd-190-1.ch-3030-85.lg-275-84.sh-290-74',
            'motto' => null,
        ]);
    }

    public function roomSelect(Request $request)
    {
        //request roomIndex: 1.
    }
}
