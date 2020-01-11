<?php

namespace Torralbodavid\DuckFunkCore\Http\Request\Housekeeping\News;

use Torralbodavid\DuckFunkCore\Http\Request\Request;

class NewsStoreRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'max:255|required',
            'subtitle' => 'max:255|required',
            'body' => 'min:10|required',
            'allCategories' => 'json|required',
            'image_link' => 'max:255',
            'hotelview_news_id' => 'max:255|integer',
            'publish_date' => 'required|date_format:Y-m-d H:i:s',
        ];
    }
}
