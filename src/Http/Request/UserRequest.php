<?php

namespace Torralbodavid\DuckFunkCore\Http\Request;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Torralbodavid\DuckFunkCore\Exceptions\Welcome\UserCheck;
use Torralbodavid\DuckFunkCore\Rules\UniqueUsername;
use Torralbodavid\DuckFunkCore\Rules\UsernameWithoutIllegalWords;

class UserRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return core()->user()->settings->can_change_name;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['min:2','max:15', 'regex:/^[a-zA-Z0-9_\-=?!@:.,.-]*$/', new UsernameWithoutIllegalWords(), new UniqueUsername()],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'validation.regex' => 'No es válido',
            'validation.min.string' => 'Nombre corto',
            'validation.max.string' => 'Nombre largo'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new UserCheck($validator);
    }
}
