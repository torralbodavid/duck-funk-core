<?php

namespace Torralbodavid\DuckFunkCore\Models\CMS;

use Illuminate\Database\Eloquent\Model;
use Torralbodavid\DuckFunkCore\Scopes\ActiveScope;
use Torralbodavid\DuckFunkCore\Scopes\PublishedScope;

class Page extends Model
{
    protected $table = 'duck_funk_pages';
    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope(new PublishedScope());
        static::addGlobalScope(new ActiveScope());
    }
}
