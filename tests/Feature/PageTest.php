<?php

namespace Torralbodavid\DuckFunkCore\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Torralbodavid\DuckFunkCore\Models\CMS\Page;
use Torralbodavid\DuckFunkCore\Tests\TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dynamic_home_page_can_be_visited()
    {
        $this->makeAuth();

        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home']);
        factory(Page::class)->create(['route' => 'hotel', 'slug' => 'hotel']);

        $response = $this->actingAs($this->user)->get($page->route);

        $response->assertSuccessful();
        $response->assertStatus(200);
    }
}
