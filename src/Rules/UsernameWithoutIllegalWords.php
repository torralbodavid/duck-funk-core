<?php


namespace Torralbodavid\DuckFunkCore\Rules;


use Illuminate\Contracts\Validation\Rule;

class UsernameWithoutIllegalWords implements Rule
{
    const ILLEGAL_WORDS = [
        'MOD-'
    ];

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        foreach (self::ILLEGAL_WORDS as $bannedWords) {
            if (stripos($value, $bannedWords) !== FALSE) {
                return false;
            }
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return 'validation.user.illegal.words';
    }
}
