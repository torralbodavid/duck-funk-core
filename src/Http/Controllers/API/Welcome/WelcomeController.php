<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\API\Welcome;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Torralbodavid\DuckFunkCore\Events\Avatar\UpdateAvatarEvent;
use Torralbodavid\DuckFunkCore\Exceptions\Welcome\UserSave;
use Torralbodavid\DuckFunkCore\Http\Request\Avatar\UserRequest;
use Torralbodavid\DuckFunkCore\Http\Request\Avatar\UserSaveRequest;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class WelcomeController extends Controller
{
    public function check(UserRequest $request)
    {
        $request->validated();

        return response()->json([
            'code' => 'OK',
            'validationResult' => null,
            'suggestions' => [],
        ]);
    }

    public function select(UserRequest $request)
    {
        core()->user()->update([
            'username' => $request['name']
        ]);

        return response()->json([
            'code' => 'OK',
            'validationResult' => null,
            'suggestions' => [],
        ]);
    }

    public function save(UserSaveRequest $request)
    {

        $request = $request->validated();

        core()->user()->update([
            'look' => $request['figure'],
            'gender' => $request['gender']
        ]);

        //event(new UpdateAvatarEvent($request));

        return response()->json([
            'uniqueId' => core()->user()->id,
            'name' => core()->user()->username,
            'figureString' => $request['figure'],
            'motto' => core()->user()->motto,
        ]);
    }

    public function roomSelect(Request $request)
    {
        //request roomIndex: 1.
    }
}
