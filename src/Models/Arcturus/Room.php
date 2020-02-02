<?php

namespace Torralbodavid\DuckFunkCore\Models\Arcturus;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $guarded = [];
    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(Item::class, 'room_id', 'id');
    }
}
