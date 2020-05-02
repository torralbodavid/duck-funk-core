<?php

namespace Torralbodavid\DuckFunkCore\Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Torralbodavid\DuckFunkCore\Models\Arcturus\User;
use Torralbodavid\DuckFunkCore\Models\CMS\Menu;
use Torralbodavid\DuckFunkCore\Models\CMS\MenuItems;
use Torralbodavid\DuckFunkCore\Models\CMS\Page;
use Torralbodavid\DuckFunkCore\Tests\TestCase;

class MenuTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function menu_acts_as_singleton()
    {
        $this->assertSame(menu(), menu());
        $this->assertSame(spl_object_id(menu()), spl_object_id(menu()));
    }

    /** @test */
    public function return_menu_instance_if_not_null()
    {
        factory(Menu::class)->create(['slug' => 'gromenauer']);

        $this->assertNotNull(menu()->getBySlug('gromenauer'));
        $this->assertInstanceOf(Menu::class, menu()->getBySlug('gromenauer'));
    }

    /** @test */
    public function return_null_if_inactive_menu()
    {
        factory(Menu::class)->create(['slug' => 'gromenauer', 'active' => false]);

        $this->assertNull(menu()->getBySlug('gromenauer'));
    }

    /** @test */
    public function return_null_if_unpublished_menu()
    {
        factory(Menu::class)->create(['slug' => 'gromenauer', 'published_at' => Carbon::tomorrow()]);

        $this->assertNull(menu()->getBySlug('gromenauer'));
    }

    /** @test */
    public function return_menu_instance_if_published_menu()
    {
        factory(Menu::class)->create(['slug' => 'gromenauer', 'published_at' => Carbon::today()]);

        $this->assertNotNull(menu()->getBySlug('gromenauer'));
        $this->assertInstanceOf(Menu::class, menu()->getBySlug('gromenauer'));
    }

    /** @test */
    public function return_null_if_no_slug_coincidence()
    {
        factory(Menu::class)->create(['slug' => 'gromenauer']);

        $this->assertNull(menu()->getBySlug('loremipsum'));
    }

    /** @test */
    public function return_null_if_any_menu_exists()
    {
        $this->assertNull(menu()->getBySlug('loremipsum'));
        $this->assertNull(menu()->getBySlug());
    }

    /** @test */
    public function return_assigned_menu_item_if_exists()
    {
        $menu = factory(Menu::class)->create(['slug' => 'gromenauer']);
        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'published_at' => Carbon::today()]);
        factory(MenuItems::class)->create(['menu_id' => $menu->id, 'page_id' => $page->id, 'published_at' => Carbon::today()]);

        $this->assertNotNull(menu()->getBySlug('gromenauer'));
        $this->assertInstanceOf(MenuItems::class, menu()->getBySlug('gromenauer')->items()->first());
    }

    /** @test */
    public function return_only_assigned_menu_items()
    {
        $menu = factory(Menu::class)->create(['slug' => 'gromenauer']);
        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'published_at' => Carbon::today()]);
        factory(MenuItems::class)->create(['id' => 288, 'menu_id' => $menu->id, 'page_id' => $page->id, 'published_at' => Carbon::today()]);
        factory(MenuItems::class)->create(['menu_id' => 23, 'page_id' => $page->id, 'published_at' => Carbon::today()]);
        factory(MenuItems::class)->create(['menu_id' => 24, 'page_id' => $page->id, 'published_at' => Carbon::today()]);

        $this->assertNotNull(menu()->getBySlug('gromenauer'));
        $this->assertEquals(288, menu()->getBySlug('gromenauer')->items()->first()->id);
        $this->assertEquals(1, menu()->getBySlug('gromenauer')->items()->count());
    }

    /** @test */
    public function return_menu_item_page()
    {
        $menu = factory(Menu::class)->create(['slug' => 'gromenauer']);
        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'published_at' => Carbon::today()]);
        factory(MenuItems::class)->create(['menu_id' => $menu->id, 'page_id' => $page->id, 'published_at' => Carbon::today()]);

        $this->assertNotNull(menu()->getBySlug('gromenauer'));
        $this->assertInstanceOf(Page::class, menu()->getBySlug('gromenauer')->items()->first()->page);
    }

    /** @test */
    public function return_null_if_menu_item_page_id_is_incorrect()
    {
        $menu = factory(Menu::class)->create(['slug' => 'gromenauer']);
        factory(MenuItems::class)->create(['menu_id' => $menu->id, 'page_id' => 288, 'published_at' => Carbon::today()]);

        $this->assertNotNull(menu()->getBySlug('gromenauer'));
        $this->assertNull(menu()->getBySlug('gromenauer')->items()->first()->page);
    }

    /** @test */
    public function return_only_menus_with_same_or_lower_rank_level()
    {
        $user = factory(User::class)->create(['rank' => 2]);
        $this->be($user);
        factory(Menu::class)->create(['slug' => 'gromenauer', 'min_rank' => 1]);
        factory(Menu::class)->create(['slug' => 'admin-menu', 'min_rank' => 3]);

        $this->assertNotNull(menu()->getBySlug('gromenauer'));
    }

    /** @test */
    public function can_return_menus_if_user_is_not_logged_in()
    {
        factory(Menu::class)->create(['slug' => 'gromenauer', 'min_rank' => 1]);

        $this->assertGuest();
        $this->assertInstanceOf(Menu::class, menu()->getBySlug('gromenauer'));
    }

    /** @test */
    public function can_return_menu_items_if_user_is_not_logged_in()
    {
        $menu = factory(Menu::class)->create(['slug' => 'gromenauer']);
        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'published_at' => Carbon::today()]);
        factory(MenuItems::class)->create(['menu_id' => $menu->id, 'page_id' => $page->id, 'published_at' => Carbon::today()]);

        $this->assertGuest();
        $this->assertNotNull(menu()->getBySlug('gromenauer'));
        $this->assertInstanceOf(MenuItems::class, menu()->getBySlug('gromenauer')->items()->first());
    }

    /** @test */
    public function can_return_page_menu_items_if_user_is_not_logged_in()
    {
        $menu = factory(Menu::class)->create(['slug' => 'gromenauer']);
        $page = factory(Page::class)->create(['route' => 'home', 'slug' => 'home', 'published_at' => Carbon::today()]);
        factory(MenuItems::class)->create(['menu_id' => $menu->id, 'page_id' => $page->id, 'published_at' => Carbon::today()]);

        $this->assertGuest();
        $this->assertNotNull(menu()->getBySlug('gromenauer'));
        $this->assertInstanceOf(Page::class, menu()->getBySlug('gromenauer')->items()->first()->page);
    }

    /** @test */
    public function can_return_different_menus_using_same_method()
    {
        factory(Menu::class)->create(['slug' => 'gromenauer']);
        factory(Menu::class)->create(['slug' => 'admin-menu']);

        $this->assertEquals('gromenauer', menu()->getBySlug('gromenauer')->slug);
        $this->assertEquals('admin-menu', menu()->getBySlug('admin-menu')->slug);
    }
}
