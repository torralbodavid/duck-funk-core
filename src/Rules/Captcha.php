<?php

namespace Torralbodavid\DuckFunkCore\Rules;

use Illuminate\Contracts\Validation\Rule;
use Torralbodavid\DuckFunkCore\Services\Captcha as CaptchaService;

class Captcha implements Rule
{
    /**
     * {@inheritdoc}
     */
    public function passes($attribute, $value)
    {
        $captcha = new CaptchaService($value);
        $response = $captcha->getResponse();

        if (! $response->success || $response->score < config('duck-funk.captcha.minimum_score')) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function message()
    {
        return 'validation.captcha.incorrect';
    }
}
