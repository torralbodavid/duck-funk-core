<?php

namespace Torralbodavid\DuckFunkCore\Core;

use Torralbodavid\DuckFunkCore\Models\CMS\Menu as MenuModel;

class Menu
{
    /**
     * @var MenuModel
     */
    protected $menu;

    /**
     * @var string
     */
    protected $slug;

    public function getBySlug($slug = null)
    {
        if ($this->menu === null || $this->slug !== $slug) {
            $this->slug = $slug;

            $this->menu = MenuModel::with(['items.page' => function ($q) {
                $q->when(core()->user() !== null, function ($user) {
                    $user->where('min_rank', '<=', core()->user()->rank);
                });
            }])->where('slug', $this->slug)
                ->when(core()->user() !== null, function ($user) {
                    $user->where('min_rank', '<=', core()->user()->rank);
                })
                ->first();
        }

        return $this->menu;
    }
}
