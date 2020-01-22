<?php

namespace Torralbodavid\DuckFunkCore\Events;

use Illuminate\Queue\SerializesModels;
use Torralbodavid\DuckFunkCore\Models\Housekeeping\News;

class NewsEvent
{
    use SerializesModels;

    public $news;

    public function __construct(News $news)
    {
        $this->$news = $news;
    }
}
