<?php

namespace Torralbodavid\DuckFunkCore\Core;

use Torralbodavid\DuckFunkCore\Models\CMS\Menu as MenuModel;

class Menu
{
    /**
     * @var MenuModel
     */
    protected $menu;

    public function getBySlug($slug = null)
    {
        if ($this->menu === null) {
            $this->menu = MenuModel::where('slug', $slug)->first();
        }

        return $this->menu;
    }
}
