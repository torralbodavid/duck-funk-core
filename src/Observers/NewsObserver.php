<?php


namespace Torralbodavid\DuckFunkCore\Observers;


use Torralbodavid\DuckFunkCore\Http\Traits\RCONConnection;
use Torralbodavid\DuckFunkCore\Models\Housekeeping\News;

class NewsObserver
{
    use RCONConnection;

    /**
     * Handle the News "created" event.
     *
     * @param News $news
     * @return void
     */
    public function created(News $news)
    {
        self::hotelAlert("Ha sido publicada una nueva noticia: {$news->title}");
    }
}
