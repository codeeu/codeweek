<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Helpers\FormatGenerator
 */

class Calendar extends Facade
{
    protected static function getFacadeAccessor() { return 'formatter'; }
}