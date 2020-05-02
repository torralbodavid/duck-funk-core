<?php

namespace Torralbodavid\DuckFunkCore\Core;

use Torralbodavid\DuckFunkCore\Models\CMS\Menu as MenuModel;

class Menu
{
    protected MenuModel $menu;

    public function getBySlug($slug = null): ?MenuModel
    {
        $this->menu = MenuModel::where('slug', $slug)->first();

        return $this->menu;
    }
}
