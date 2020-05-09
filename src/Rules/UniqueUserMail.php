<?php

namespace Torralbodavid\DuckFunkCore\Rules;

use Illuminate\Contracts\Validation\Rule;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class UniqueUserMail implements Rule
{
    /**
     * {@inheritdoc}
     */
    public function passes($attribute, $value)
    {
        return ! User::where('mail', $value)->where('id', '!=', core()->user()->id)->exists();
    }

    /**
     * {@inheritdoc}
     */
    public function message()
    {
        return 'validation.email.taken';
    }
}
