# laravel-influxdb - Brings InfluxDB to your Laravel Application
Licence: MIT  
Author: Pascal Krason <p.krason@padr.io>  
Language: PHP 7.1
Laravel: Min. 5.5 - 5.8  
Supports [Auto-Discovery](https://laravel-news.com/package-auto-discovery): Yes

# Introduction
Please note, this package is by far not completed but can be seen as production ready. There are a few features I will implement in the near future such as implementing a queue to boost the write performance or supporting multiple connections. If you have suggestions just open an [Issue](https://github.com/Padrio/laravel-influxdb/issues)). 

This package just provides a very basic implementation by making everything as easy as writing a configuration - literaly.

# Requirements
On the PHP side there are not much requirements, you only need at least PHP 5.6 or 7.1 and the curl-Extension installed. Then you can go ahead and install everything through [Composer](http://getcomposer.org) which will take care of everything else.

# Installation
## Step 1 - Require as dependency 
Execute composer inside your project's directory to require the latest version:
```
composer require padrio/laravel-influxdb
``` 

## Step 2 - Enable the package (Optional)
With the release of Laravel 5.5 the "Auto Discovery" feature has been introduced. This automatically registers the ServiceProvider and Facade for you. If somehow this does not work or you simply disabled this feature, just follow the next steps.

Inside `config/app.php` you need to register the ServiceProvider:
```php
// config/app.php

'providers' => [
    // (...)
    Padrio\InfluxDB\Providers\ServiceProvider::class,  
];
```
And in the same file there is a section to register an alias for the facades:
```php
// config/app.php

'aliases' => [
    //
    'InfluxDb' => Padrio\InfluxDB\Facade::class,
];
```

## Step 3 - Configuration
First you need to publish our predefined config file using artisan: 
```
php artisan vendor:publish --provider="Padrio\InfluxDB\Providers\ServiceProvider"
```
which should create the file `config/influxdb.php` which can be modified to your needs. 

You can also either just set the following environment variables, or for development purposes you can just insert them into your .env file:
```
INFLUXDB_PROTOCOL=http
INFLUXDB_USER=null
INFLUXDB_PASS=null
INFLUXDB_HOST=localhost
INFLUXDB_PORT=8086
INFLUXDB_DATABASE=default
INFLUXDB_QUEUE_ENABLE=false
INFLUXDB_QUEUE_DRIVER=default
INFLUXDB_TIMEOUT=5
INFLUXDB_VERIFY_SSL=true
```

# Examples

## Basic example
Since this is just a simple wrapper for the official php library, there is not much to documentate on my side. You can either call the helper function `InfluxDB()` which returns a instance of `InfluxDB\Database`.

```php
// Get the Client using a facade
$client = InfluxDB::getClient()

// ... using the helper
$client = InfluxDB();

// Check if the database is existing
var_dump(InfluxDB()->exists()); // returns a bool

// Create the configured database
var_dump(InfluxDB()->craete()); // returns null)
```
For further instructions, check out the [offical documentation](https://github.com/influxdata/influxdb-php#getting-started).

# Multiple connectinos & Queue 
Theese are features which will be introduced soon, stay tuned.