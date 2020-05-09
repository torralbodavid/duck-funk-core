<?php

namespace Torralbodavid\DuckFunkCore\Http\Traits;

use Illuminate\Validation\ValidationException;
use Torralbodavid\DuckFunkCore\Services\Captcha as CaptchaService;

trait Captcha
{
    public function validate($recaptcha_response, float $score = 0.5): void
    {
        $captcha = new CaptchaService($recaptcha_response);
        $response = $captcha->getResponse();

        if(! $response->success || $response->score < $score) {
            throw ValidationException::withMessages(['field_name' => 'validation.captcha.incorrect']);
        }
    }
}
