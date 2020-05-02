<?php

namespace Torralbodavid\DuckFunkCore\Tests\Feature;

use Torralbodavid\DuckFunkCore\Tests\TestCase;

class MenuTest extends TestCase
{
    /** @test */
    public function menu_acts_as_singleton()
    {
        $this->assertSame(menu(), menu());
        $this->assertSame(spl_object_id(menu()), spl_object_id(menu()));
    }
}
