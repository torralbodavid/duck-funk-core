<?php

namespace Torralbodavid\DuckFunkCore;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Torralbodavid\DuckFunkCore\Skeleton\SkeletonClass
 */
class DuckFunkCoreFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'duck-funk-core';
    }
}
