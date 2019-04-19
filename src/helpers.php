<?php

use InfluxDB\Database;
use Padrio\InfluxDB\Client;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
if (!function_exists('InfluxDB')) {

    /**
     * @return Database|\InfluxDB\Client
     */
    function InfluxDB()
    {
        return Client::Instance();
    }
}