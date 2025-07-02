<?php

namespace muazzamkhan\Tabby\Facades;

use Illuminate\Support\Facades\Facade;

class Tabby extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tabby';
    }
}
