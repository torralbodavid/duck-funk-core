<?php

namespace Torralbodavid\DuckFunkCore\Services;

class Captcha
{
    protected const SERVICE_URL = 'https://www.google.com/recaptcha/api/siteverify';
    protected string $secret = '';
    protected $response = '';

    public function __construct($recaptcha_response)
    {
        $this->secret = config('duck-funk.captcha.secret_key');
        $this->response = $recaptcha_response;
    }

    public function getResponse()
    {
        $recaptcha = file_get_contents(self::SERVICE_URL.'?secret='.$this->secret.'&response='.$this->response);

        return json_decode($recaptcha);
    }
}
