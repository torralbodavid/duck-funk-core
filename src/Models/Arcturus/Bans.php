<?php

namespace Torralbodavid\DuckFunkCore\Models\Arcturus;

use Illuminate\Database\Eloquent\Model;

class Bans extends Model
{
    protected $table = 'bans';
    protected $guarded = [];

    /*
     * Get the user related to this ban
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
