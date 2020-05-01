<?php

namespace Torralbodavid\DuckFunkCore\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;
use Torralbodavid\DuckFunkCore\Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_cannot_view_register_page_when_logged_in()
    {
        $this->makeAuth();
        $response = $this->get(route('register'));

        $response->assertRedirect();
    }

    /** @test */
    public function user_can_be_registered()
    {
        $response = $this->post(route('register'), [
            'username' => 'gromenauer',
            'mail' => 'perico@palotes.com',
            'password' => 'secretWord93',
            'password_confirmation' => 'secretWord93',
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('users', [
            'username' => 'gromenauer',
            'mail' => 'perico@palotes.com',
        ]);
    }

    /** @test */
    public function user_cannot_view_login_page_when_logged_in()
    {
        $this->makeAuth();
        $response = $this->get(route('login'));

        $response->assertRedirect();
    }

    /** @test */
    public function user_can_be_logged_in()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create(['mail' => 'lorem@ipsum.com', 'password' => Hash::make('illumina')]);

        $response = $this->post(route('login'), [
            'mail' => 'lorem@ipsum.com',
            'password' => 'illumina'
            ]);

        $response->assertRedirect('/home');

        $this->assertCredentials(['mail' => 'lorem@ipsum.com', 'password' => 'illumina']);
        $this->assertAuthenticatedAs($user);
    }
}
