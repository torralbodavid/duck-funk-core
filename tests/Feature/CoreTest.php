<?php

namespace Torralbodavid\DuckFunkCore\Tests\Feature;

use Torralbodavid\DuckFunkCore\Models\Arcturus\User;
use Torralbodavid\DuckFunkCore\Tests\TestCase;

class CoreTest extends TestCase
{
    /** @test */
    public function core_acts_as_singleton()
    {
        $this->assertSame(core(), core());
        $this->assertSame(spl_object_id(core()), spl_object_id(core()));
    }

    /** @test */
    public function core_user_returns_authenticable_object()
    {
        $this->makeAuth();
        $this->assertInstanceOf(User::class, core()->user());
    }

    /** @test */
    public function core_returns_null_user_if_unauthenticated()
    {
        $this->assertNull(core()->user());
    }
}
