<?php

namespace Torralbodavid\DuckFunkCore\Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\TestResponse;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Ban;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;
use Torralbodavid\DuckFunkCore\Models\CMS\Page;
use Torralbodavid\DuckFunkCore\Tests\TestCase;

class BanTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create(['mail' => 'lorem@ipsum.com', 'password' => Hash::make('illumina')]);
    }

    /** @test */
    public function account_banned_user_is_redirected_to_expulsion_page()
    {
        factory(Ban::class)->create(['user_id' => $this->user->id, 'ban_expire' => Carbon::tomorrow()->timestamp, 'type' => 'account']);
        $response = $this->post(route('login'), [
            'mail' => 'lorem@ipsum.com',
            'password' => 'illumina',
        ]);

        $this->assertRedirectToExpulsion($response);
    }

    /** @test */
    public function ip_banned_user_is_redirected_to_expulsion_page()
    {
        factory(Ban::class)->create(['user_id' => $this->user->id, 'ip' => request()->ip(), 'ban_expire' => Carbon::tomorrow()->timestamp, 'type' => 'ip']);

        $response = $this->post(route('login'), [
            'mail' => 'lorem@ipsum.com',
            'password' => 'illumina',
        ]);

        $this->assertRedirectToExpulsion($response);
    }

    /** @test */
    public function machine_banned_user_is_redirected_to_expulsion_page()
    {
        factory(Ban::class)->create(['user_id' => $this->user->id, 'machine_id' => $this->user->machine_id, 'ban_expire' => Carbon::tomorrow()->timestamp, 'type' => 'machine']);

        $response = $this->post(route('login'), [
            'mail' => 'lorem@ipsum.com',
            'password' => 'illumina',
        ]);

        $this->assertRedirectToExpulsion($response);
    }

    /** @test */
    public function super_banned_user_is_redirected_to_expulsion_page()
    {
        factory(Ban::class)->create(['user_id' => $this->user->id, 'ban_expire' => Carbon::tomorrow()->timestamp, 'type' => 'super']);
        $response = $this->post(route('login'), [
            'mail' => 'lorem@ipsum.com',
            'password' => 'illumina',
        ]);

        $this->assertRedirectToExpulsion($response);
    }

    /** @test */
    public function expired_account_banned_user_is_not_redirected_to_expulsion_page()
    {
        factory(Ban::class)->create(['user_id' => $this->user->id, 'ban_expire' => Carbon::yesterday()->timestamp, 'type' => 'account']);
        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home']);

        $this->assertRedirectHome($page);
    }

    /** @test */
    public function expired_ip_banned_user_is_not_redirected_to_expulsion_page()
    {
        factory(Ban::class)->create(['user_id' => $this->user->id, 'ip' => request()->ip(), 'ban_expire' => Carbon::yesterday()->timestamp, 'type' => 'ip']);
        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home']);

        $this->assertRedirectHome($page);
    }

    /** @test */
    public function expired_machine_banned_user_is_not_redirected_to_expulsion_page()
    {
        factory(Ban::class)->create(['user_id' => $this->user->id, 'machine_id' => $this->user->machine_id, 'ban_expire' => Carbon::yesterday()->timestamp, 'type' => 'machine']);
        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home']);

        $this->assertRedirectHome($page);
    }

    /** @test */
    public function expired_super_banned_user_is_not_redirected_to_expulsion_page()
    {
        factory(Ban::class)->create(['user_id' => $this->user->id, 'ban_expire' => Carbon::yesterday()->timestamp, 'type' => 'super']);
        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home']);

        $this->assertRedirectHome($page);
    }

    /** @test */
    public function expired_banned_user_is_redirected_to_welcome_page_if_entering_expulsion_page()
    {
        factory(Ban::class)->create(['user_id' => $this->user->id, 'ban_expire' => Carbon::yesterday()->timestamp, 'type' => 'account']);

        $response = $this->actingAs($this->user)->get(route('ban'));
        $response->assertStatus(301);
        $response->assertRedirect(route('welcome'));
    }

    /** @test */
    public function non_banned_user_is_redirected_to_welcome_page_if_entering_expulsion_page()
    {
        $response = $this->actingAs($this->user)->get(route('ban'));
        $response->assertStatus(301);
        $response->assertRedirect(route('welcome'));
    }

    private function assertRedirectHome(Page $page)
    {
        factory(Page::class)->create(['route' => 'hotel', 'slug' => 'hotel']);
        $response = $this->actingAs($this->user)->get($page->route);

        $response->assertSuccessful();
        $response->assertStatus(200);
    }

    private function assertRedirectToExpulsion(TestResponse $response)
    {
        $this->assertAuthenticatedAs($this->user);
        $response->assertRedirect('/home');

        $this->assertCredentials(['mail' => 'lorem@ipsum.com', 'password' => 'illumina']);
        $this->assertAuthenticatedAs($this->user);

        $response = $this->actingAs($this->user)->get('/home');
        $response->assertRedirect('/expulsion');
    }
}
