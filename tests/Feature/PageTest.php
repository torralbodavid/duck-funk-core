<?php

namespace Torralbodavid\DuckFunkCore\Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Torralbodavid\DuckFunkCore\Models\Arcturus\Permission;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;
use Torralbodavid\DuckFunkCore\Models\CMS\Page;
use Torralbodavid\DuckFunkCore\Tests\TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dynamic_page_can_be_visited()
    {
        $this->makeAuth();

        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home']);
        factory(Page::class)->create(['route' => 'hotel', 'slug' => 'hotel']);

        $response = $this->actingAs($this->user)->get($page->route);

        $response->assertSuccessful();
        $response->assertStatus(200);
    }

    /** @test */
    public function unpublished_dynamic_page_returns_404()
    {
        $this->makeAuth();

        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'published_at' => Carbon::tomorrow()]);
        factory(Page::class)->create(['route' => 'hotel', 'slug' => 'hotel']);

        $response = $this->actingAs($this->user)->get($page->route);

        $response->assertStatus(404);
    }

    /** @test */
    public function deleted_dynamic_page_returns_404()
    {
        $this->makeAuth();

        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'deleted_at' => now()]);
        factory(Page::class)->create(['route' => 'hotel', 'slug' => 'hotel']);

        $response = $this->actingAs($this->user)->get($page->route);

        $response->assertStatus(404);
    }

    /** @test */
    public function disabled_dynamic_page_returns_404()
    {
        $this->makeAuth();

        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'active' => false]);
        factory(Page::class)->create(['route' => 'hotel', 'slug' => 'hotel']);

        $response = $this->actingAs($this->user)->get($page->route);

        $response->assertStatus(404);
    }

    /** @test */
    public function dynamic_page_can_be_visited_when_same_rank()
    {
        $user = factory(User::class)->create(['rank' => 1]);

        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'min_rank' => 1]);
        factory(Page::class)->create(['route' => 'hotel', 'slug' => 'hotel']);

        $response = $this->actingAs($user)->get($page->route);

        $response->assertSuccessful();
        $response->assertStatus(200);
    }

    /** @test */
    public function dynamic_page_can_be_visited_when_high_rank()
    {
        factory(Permission::class)->create(['id' => 7, 'rank_name' => 'Mega gromenauer']);
        $user = factory(User::class)->create(['rank' => 7]);

        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'min_rank' => 1]);
        factory(Page::class)->create(['route' => 'hotel', 'slug' => 'hotel']);

        $response = $this->actingAs($user)->get($page->route);

        $response->assertSuccessful();
        $response->assertStatus(200);
    }

    /** @test */
    public function dynamic_page_cannot_be_visited_when_lower_rank()
    {
        factory(Permission::class)->create(['id' => 7, 'rank_name' => 'Mega gromenauer']);
        $user = factory(User::class)->create(['rank' => 1]);

        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'min_rank' => 7]);
        factory(Page::class)->create(['route' => 'hotel', 'slug' => 'hotel']);

        $response = $this->actingAs($user)->get($page->route);

        $response->assertStatus(302);
        $response->assertRedirect(route('welcome'));
    }

    /** @test */
    public function dynamic_page_has_correct_metatags()
    {
        $this->makeAuth();

        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home']);
        factory(Page::class)->create(['route' => 'hotel', 'slug' => 'hotel']);

        $response = $this->actingAs($this->user)->get($page->route);

        $response->assertSuccessful();
        $response->assertStatus(200);

        $this->assertStringContainsString($page->meta_title, $response->getContent());
        $this->assertStringContainsString($page->meta_description, $response->getContent());
    }

    /** @test */
    public function dynamic_page_has_no_robots_tag_when_true()
    {
        $this->makeAuth();

        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'no_robots' => true]);
        factory(Page::class)->create(['route' => 'hotel', 'slug' => 'hotel']);

        $response = $this->actingAs($this->user)->get($page->route);

        $response->assertSuccessful();
        $response->assertStatus(200);

        $this->assertStringContainsString('<meta name="robots" content="noindex, nofollow">', $response->getContent());
    }

    /** @test */
    public function dynamic_page_hasnt_no_robots_tag_when_false()
    {
        $this->makeAuth();

        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'no_robots' => false]);
        factory(Page::class)->create(['route' => 'hotel', 'slug' => 'hotel']);

        $response = $this->actingAs($this->user)->get($page->route);

        $response->assertSuccessful();
        $response->assertStatus(200);

        $this->assertStringNotContainsString('<meta name="robots" content="noindex, nofollow">', $response->getContent());
    }
}
