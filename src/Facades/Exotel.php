<?php

namespace Irajul\Exotel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Irajul\Exotel\Exotel
 */
class Exotel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Irajul\Exotel\Exotel::class;
    }
}
