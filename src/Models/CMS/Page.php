<?php

namespace Torralbodavid\DuckFunkCore\Models\CMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Torralbodavid\DuckFunkCore\Scopes\ActiveScope;
use Torralbodavid\DuckFunkCore\Scopes\PublishedScope;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'duck_funk_pages';

    protected static function booted()
    {
        static::addGlobalScope(new PublishedScope());
        static::addGlobalScope(new ActiveScope());
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
}
