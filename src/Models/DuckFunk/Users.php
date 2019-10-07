<?php


namespace Torralbodavid\DuckFunkCore\Models\DuckFunk;


use Illuminate\Database\Eloquent\Model;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Users as ArcturusUsers;

class Users extends Model
{
    protected $table = 'duck_funk_users';

    /**
     * Get the avatars for this user.
     */
    public function avatars()
    {
        return $this->hasMany(ArcturusUsers::class, 'mail', 'email');
    }
}
