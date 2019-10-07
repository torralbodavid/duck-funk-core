<?php

namespace Torralbodavid\DuckFunkCore\Models\Arcturus;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $guarded = [];

    /**
     * Get the permissions for this avatar.
     */
    public function permissions()
    {
        return $this->hasOne(Permissions::class, 'id', 'rank');
    }
}
