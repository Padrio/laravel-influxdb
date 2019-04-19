<?php

namespace Padrio\InfluxDB;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'InfluxDB';
    }
}