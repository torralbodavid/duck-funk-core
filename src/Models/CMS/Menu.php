<?php

namespace Torralbodavid\DuckFunkCore\Models\CMS;

use Illuminate\Database\Eloquent\Model;
use Torralbodavid\DuckFunkCore\Scopes\ActiveScope;
use Torralbodavid\DuckFunkCore\Scopes\PublishedScope;

class Menu extends Model
{
    protected $table = 'duck_funk_menus';
    public $with = ['items.page'];

    protected static function booted()
    {
        static::addGlobalScope(new PublishedScope());
        static::addGlobalScope(new ActiveScope());
    }

    public function items()
    {
        return $this->hasMany(MenuItems::class, 'menu_id');
    }
}
