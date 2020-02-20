<?php

namespace Torralbodavid\DuckFunkCore\Http\Resources\Marketing;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'categories' => $this->categories,
            'image' => $this->image_link,
            'author' => $this->author(),
        ];
    }
}
