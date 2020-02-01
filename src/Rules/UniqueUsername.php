<?php

namespace Torralbodavid\DuckFunkCore\Rules;

use Illuminate\Contracts\Validation\Rule;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class UniqueUsername implements Rule
{

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        return ! User::where('username', $value)->where('id', '!=', core()->user()->id)->exists();
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return 'validation.user.taken';
    }
}
