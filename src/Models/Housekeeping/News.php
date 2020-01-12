<?php


namespace Torralbodavid\DuckFunkCore\Models\Housekeeping;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Torralbodavid\DuckFunkCore\Events\NewsEvent;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'duck_funk_news';
    protected $guarded = [];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => NewsEvent::class
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author');
    }
}
