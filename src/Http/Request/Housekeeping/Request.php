<?php

namespace Torralbodavid\DuckFunkCore\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return core()->user()->permissions->housekeeping_write;
    }
}
