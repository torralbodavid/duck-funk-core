<?php

namespace Torralbodavid\DuckFunkCore\Http\Request\Avatar;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Torralbodavid\DuckFunkCore\Exceptions\Welcome\UserSave;

class UserSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'figure' => ['required'],
            'gender' => ['required', 'max:1', Rule::in(['m', 'f'])],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new UserSave($validator);
    }
}
