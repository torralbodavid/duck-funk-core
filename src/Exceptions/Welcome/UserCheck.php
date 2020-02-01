<?php


namespace Torralbodavid\DuckFunkCore\Exceptions\Welcome;

use Exception;
use Illuminate\Contracts\Validation\Validator;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class UserCheck extends Exception
{
    protected $validator;

    protected $code = 422;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function render()
    {
        if($this->validator->errors()->first() == "validation.min.string"){
            return response()->json([
                'code' => 'INVALID_NAME',
                'validationResult' => [
                    'resultType' => 'VALIDATION_ERROR_NAME_TOO_SHORT',
                    'additionalInfo' => 2,
                    'valid' => false
                ],
                'suggestions' => [User::randomNickname()]
            ]);
        }

        if($this->validator->errors()->first() == "validation.max.string"){
            return response()->json([
                'code' => 'INVALID_NAME',
                'validationResult' => [
                    'resultType' => 'VALIDATION_ERROR_NAME_TOO_LONG',
                    'additionalInfo' => 15,
                    'valid' => false
                ],
                'suggestions' => [User::randomNickname()]
            ]);
        }

        if($this->validator->errors()->first() == "validation.regex"){
            return response()->json([
                'code' => 'INVALID_NAME',
                'validationResult' => [
                    'resultType' => 'VALIDATION_ERROR_ILLEGAL_CHARS',
                    'additionalInfo' => null,
                    'valid' => false
                ],
                'suggestions' => []
            ]);
        }

        if($this->validator->errors()->first() == "validation.user.taken") {
            return response()->json([
                'code' => 'NAME_IN_USE',
                'validationResult' => null,
                'suggestions' => [User::randomNickname()]
            ]);
        }

        if($this->validator->errors()->first() == 'validation.user.illegal.words') {
            return response()->json([
                'code' => 'INVALID_NAME',
                'validationResult' => [
                    'resultType' => 'VALIDATION_ERROR_ILLEGAL_WORDS',
                    'additionalInfo' => '',
                    'valid' => false
                ],
                'suggestions' => [User::randomNickname()]
            ]);
        }

        return response()->json([
            'code' => 'INVALID_NAME',
            'validationResult' => [
                'resultType' => 'VALIDATION_ERROR_UNKNOWN',
                'additionalInfo' => null,
                'valid' => false
            ],
            'suggestions' => []
        ]);
    }
}
