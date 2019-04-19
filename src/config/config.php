<?php

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Connection
    |--------------------------------------------------------------------------
    |
    | Specify the data required to establish a connection to the database.
    |
    */
    'connection' => [
        'protocol'  => env('INFLUXDB_PROTOCOL', 'http'),
        'username'  => env('INFLUXDB_USER', null),
        'password'  => env('INFLUXDB_PASS', null),
        'hostname'  => env('INFLUXDB_HOST', 'localhost'),
        'port'      => env('INFLUXDB_PORT', 8086),
        'database'  => env('INFLUXDB_DATABASE', 'default'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Queueing
    |--------------------------------------------------------------------------
    |
    | !!! This feature is not implemented yet !!!
    |
    | Using Laravel's implemented queue feature we can boost the
    | write performance and also prevent a dos-like overload when InfluxDB
    | service should be not available, which would be invoked by running
    | into the (see 'timeout') configured connection timeout.
    |
    */
    // @Todo: Implement this feature.
    'queue' => [
        'enable' => env('INFLUXDB_QUEUE_ENABLE', false),
        'driver' => env('INFLUXDB_QUEUE_DRIVER', 'default'),
    ],

    'timeout'       => env('INFLUXDB_TIMEOUT', 5),
    'verify_ssl'    => env('INFLUXDB_VERIFY_SSL', true),
];