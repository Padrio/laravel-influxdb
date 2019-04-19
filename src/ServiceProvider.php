<?php

namespace Padrio\InfluxDB;

use InfluxDB\Client\Exception;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('influxdb'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/config/config.php', 'influxdb'
        );
    }

    /**
     * Register services.
     *
     * @return void
     * @throws Exception
     */
    public function register()
    {
        $this->app->instance(Client::ALIAS, Client::create());
    }

}
