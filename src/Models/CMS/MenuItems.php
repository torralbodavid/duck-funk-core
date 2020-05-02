<?php

namespace Torralbodavid\DuckFunkCore\Models\CMS;

use Illuminate\Database\Eloquent\Model;
use Torralbodavid\DuckFunkCore\Scopes\ActiveScope;
use Torralbodavid\DuckFunkCore\Scopes\PublishedScope;

class MenuItems extends Model
{
    protected $table = 'duck_funk_menus_items';

    protected static function booted()
    {
        static::addGlobalScope(new PublishedScope());
        static::addGlobalScope(new ActiveScope());
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function page()
    {
        return $this->hasOne(Page::class, 'id', 'page_id');
    }
}
