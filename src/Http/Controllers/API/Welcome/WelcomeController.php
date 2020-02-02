<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\API\Welcome;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Torralbodavid\DuckFunkCore\Http\Request\Avatar\UserRequest;
use Torralbodavid\DuckFunkCore\Http\Request\Avatar\UserSaveRequest;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Room;

class WelcomeController extends Controller
{
    private const ROOMINDEX = [1,2,3];

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
            'username' => $request['name'],
        ]);

        core()->user()->settings->update([
            'welcome_flow_step' => 2,
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
            'gender' => $request['gender'],
        ]);

        return response()->json([
            'uniqueId' => core()->user()->id,
            'name' => core()->user()->username,
            'figureString' => $request['figure'],
            'motto' => core()->user()->motto,
        ]);
    }

    public function roomSelect(Request $request)
    {
        if(! in_array($request->roomIndex, self::ROOMINDEX)){
            throw new Exception('Debe escoger una sala válida');
        }

        if($request->roomIndex == 1) {
            $roomTemplate = Room::find(3);
        }

        if($request->roomIndex == 2) {
            $roomTemplate = Room::find(5);
        }

        if($request->roomIndex == 3) {
            $roomTemplate = Room::find(6);
        }

        $room = new Room();
        $room->owner_id = core()->user()->id;
        $room->owner_name = core()->user()->username;
        $room->name = 'Territorio '.core()->user()->username;
        $room->description = '¡Una sala pre-decorada!';
        $room->model = 'model_h';
        $room->paper_floor = $roomTemplate->paper_floor;
        $room->paper_wall = $roomTemplate->paper_wall;
        $room->paper_landscape = $roomTemplate->paper_landscape;
        $room->saveOrFail();

        $roomTemplate->items->each(function ($itemTemplate) use ($room) {
            $item = $itemTemplate->replicate();
            $item->user_id = core()->user()->id;
            $item->room_id = $room->id;
            $item->saveOrFail();
        });

        core()->user()->settings->update(['welcome_flow_enabled' => false]);
        core()->user()->update(['home_room' => $room->id]);
    }
}
