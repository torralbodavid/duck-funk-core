<?php

namespace Torralbodavid\DuckFunkCore\Models\Arcturus;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Torralbodavid\DuckFunkCore\Events\UserEvent;

class User extends Model implements Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $guarded = [];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => UserEvent::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password', 'account_created', 'ip_register', 'ip_current', 'last_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getEmailAttribute()
    {
        return $this->mail;
    }

    public function getEmailForPasswordReset()
    {
        return $this->mail;
    }

    public function getEmailForVerification()
    {
        return $this->mail;
    }

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

    /**
     * Get friend requests.
     */
    public function friend_requests()
    {
        return $this->belongsToMany($this, 'messenger_friendrequests', 'user_to_id', 'user_from_id');
    }

    /**
     * Get friends.
     */
    public function friends()
    {
        return $this->belongsToMany($this, 'messenger_friendships', 'user_one_id', 'user_two_id');
    }

    public function getLastLoginAttribute()
    {
        return Carbon::createFromTimestamp($this->attributes['last_login'])->diffForHumans();
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
        return $this->password;
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
        $username = preg_replace('/[^A-Za-z0-9 ]/', '',
            faker('firstName').faker('lastName').faker()->numberBetween(1, 99)
        );

        return (self::where('username', $username)->exists()) ? self::randomNickname() : $username;
    }
}
