<?php

namespace Torralbodavid\DuckFunkCore\Models\Arcturus;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'permissions';
    protected $guarded = [];
    public $timestamps = false;

    public function getHousekeepingReadAttribute()
    {
        return $this->duck_funk_housekeeping_read;
    }

    public function getHousekeepingWriteAttribute()
    {
        return $this->duck_funk_housekeeping_write;
    }
}
