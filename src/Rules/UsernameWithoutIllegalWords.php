<?php

namespace Torralbodavid\DuckFunkCore\Rules;

use Illuminate\Contracts\Validation\Rule;

class UsernameWithoutIllegalWords implements Rule
{
    const ILLEGAL_WORDS = [
        'MOD-',
    ];

    /**
     * {@inheritdoc}
     */
    public function passes($attribute, $value)
    {
        foreach (self::ILLEGAL_WORDS as $bannedWords) {
            if (stripos($value, $bannedWords) !== false) {
                return false;
            }
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function message()
    {
        return 'validation.user.illegal.words';
    }
}
