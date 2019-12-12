<?php

namespace Torralbodavid\DuckFunkCore\Tests;

use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class UserTest extends TestCase
{
    /** @test */
    public function user_can_be_created()
    {
        $user = factory(User::class)->create();

        $this->assertDatabaseHas('users', [
            'username' => $user->username,
            'mail' => $user->mail,
            'password' => $user->password,
            'account_created' => $user->account_created,
            'ip_register' => $user->ip_register,
            'ip_current' => $user->ip_current,
        ]);
    }
}
