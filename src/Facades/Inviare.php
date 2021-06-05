<?php

namespace Tperrelli\Inviare\Facades;

use Illuminate\Support\Facades\Facade;

class Inviare extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'inviare';
    }
}