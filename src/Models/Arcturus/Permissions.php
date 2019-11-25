<?php

namespace Torralbodavid\DuckFunkCore\Models\Arcturus;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'permissions';
    protected $guarded = [];

    public function canReadHousekeeping()
    {
        return $this->duck_funk_housekeeping_read;
    }
}
