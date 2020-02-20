<?php

namespace Torralbodavid\DuckFunkCore\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_be_registered()
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
