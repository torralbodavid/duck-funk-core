<?php

namespace Torralbodavid\DuckFunkCore\Models\Arcturus;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $table = 'bans';
    protected $guarded = [];
    public $timestamps = false;

    /*
     * Get the user related to this ban
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
