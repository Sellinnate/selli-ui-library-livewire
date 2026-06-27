<?php

namespace Selli\Ui\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string css()
 * @method static string js()
 * @method static array<string, string> colors()
 *
 * @see \Selli\Ui\SelliUi
 */
class SelliUi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Selli\Ui\SelliUi::class;
    }
}
