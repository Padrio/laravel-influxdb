<?php

namespace Padrio\InfluxDB\Providers;

use InfluxDB\Client\Exception;
use InfluxDB\Database;

/**
 * @author Pascal Krason <p.krason@padr.io>
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

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
        $this->app->instance('InfluxDB', Client\Factory::create());
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Database::class,
        ];
    }

}
