<?php

namespace Torralbodavid\DuckFunkCore\Models\Arcturus;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $guarded = [];
    public $timestamps = false;

    public function getTitleAttribute()
    {
        return $this->rank_name;
    }

    public function getHousekeepingReadAttribute()
    {
        return $this->duck_funk_housekeeping_read;
    }

    public function getHousekeepingWriteAttribute()
    {
        return $this->duck_funk_housekeeping_write;
    }

    public function users()
    {
        return $this->hasMany(User::class, 'rank');
    }
}
