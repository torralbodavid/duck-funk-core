<?php

namespace Torralbodavid\DuckFunkCore\Exceptions\Welcome;

use Exception;
use Illuminate\Contracts\Validation\Validator;

class UserSave extends Exception
{
    protected $validator;

    protected $code = 422;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function render()
    {
        if ($this->validator->errors()->first() == 'validation.in') {
            return response()->json([
                'code' => 'INVALID_GENDER',
                'validationResult' => [
                    'resultType' => 'INVALID_GENDER',
                    'valid' => false,
                ],
            ]);
        }

        return response()->json([
            'code' => 'INVALID_NAME',
            'validationResult' => [
                'resultType' => 'VALIDATION_ERROR_UNKNOWN',
                'additionalInfo' => null,
                'valid' => false,
            ],
            'suggestions' => [],
        ]);
    }
}
