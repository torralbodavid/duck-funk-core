<?php

namespace Torralbodavid\DuckFunkCore\Models\Arcturus;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class User extends Model implements Authenticatable
{
    use HasRoles;

    protected $table = 'users';
    protected $guarded = [];

    /**
     * Get the permissions for an avatar.
     */
    public function permissions()
    {
        return $this->hasOne(Permissions::class, 'id', 'rank');
    }

    /*
     * Get the bans for an avatar
     */
    public function bans()
    {
        return $this->hasMany(Bans::class, 'id', 'user_id');
    }

    public function getLastLogin()
    {
        return Carbon::parse($this->last_login)->diffForHumans();
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'mail';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return auth()->user()->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return auth()->user()->getRememberToken();
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        return auth()->user()->setRememberToken();
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return auth()->user()->getRememberTokenName();
    }
}
