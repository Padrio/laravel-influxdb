<?php

namespace Padrio\InfluxDB;

use InfluxDB\Client\Exception;
use InfluxDB\Database;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
final class Client
{
    const ALIAS = 'InfluxDB';

    /**
     * @return Database|\InfluxDB\Client
     * @throws Exception
     */
    public static function create()
    {
        // Pre-Define Variables to avoid warnings
        $username = $password = $hostname = $port = $database = null;

        // Fill previously defined variables with values from the config
        extract(config('influxdb.connection'));

        $timeout = config('influxdb.timeout') ?? 5;
        $verifySSl = config('influxdb.verify_ssl') ?? true;
        $protocol = self::getProtocol();

        $dsn = "{$protocol}://{$username}:{$password}@{$hostname}:{$port}/{$database}";

        try {
            return \InfluxDB\Client::fromDSN($dsn, $timeout, $verifySSl);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @return string
     */
    private static function getProtocol()
    {
        $allowed = ['https', 'udp'];
        $configured = config('influxdb.protocol') ?? [];

        $protocol = 'influxdb';
        if (in_array($configured, $allowed)) {
            $protocol = $configured.'+'.$protocol;
        }

        return $protocol;
    }

    /**
     * @return Database|\InfluxDB\Client
     */
    public static function Instance()
    {
        return app(self::ALIAS);
    }
}