<?php

namespace Torralbodavid\DuckFunkCore\Models\Arcturus;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
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
     * Get avatar settings
     */
    public function settings()
    {
        return $this->hasOne(UserSettings::class, 'user_id', 'id');
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

    /*
     * Custom methods
     */
    public static function randomNickname()
    {
        $username = preg_replace("/[^A-Za-z0-9 ]/", '',
            faker('firstName').faker('lastName').faker()->numberBetween(1, 99)
        );

        return (User::where('username', $username)->exists()) ? self::randomNickname() : $username;
    }
}
