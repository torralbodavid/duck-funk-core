<?php

namespace Torralbodavid\DuckFunkCore\Http\Controllers\Pages;

use Torralbodavid\DuckFunkCore\Models\Arcturus\Permission;

class StaffController extends Controller
{
    const HIDDEN_RANKS = [1, 2];

    protected function getData(): array
    {
        $ranks = Permission::whereHas('users')
            ->whereNotIn('id', self::HIDDEN_RANKS)
            ->orderByDesc('id')
            ->get();

        return [
            'ranks' => $ranks
        ];
    }
}
