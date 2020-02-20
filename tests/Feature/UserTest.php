<?php

namespace Torralbodavid\DuckFunkCore\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

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

    /** @test */
    public function a_user_can_register()
    {
        $response = $this->post(route('register'), [
            'username' => 'gromenauer',
            'mail' => 'perico@palotes.com',
            'password' => 'secretWord93',
            'password_confirmation' => 'secretWord93',
        ]);

        $user = User::where('username', 'gromenauer')->first();

        $this->assertEquals('gromenauer', $user->username);
        $response->assertRedirect();
    }
}
