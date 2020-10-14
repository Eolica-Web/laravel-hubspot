# Laravel wrapper for the HubSpot API PHP Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/eolica/laravel-hubspot.svg?style=flat-square)](https://packagist.org/packages/eolica/laravel-hubspot) [![Total Downloads](https://img.shields.io/packagist/dt/eolica/laravel-hubspot.svg?style=flat-square)](https://packagist.org/packages/eolica/laravel-hubspot)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via [Composer](https://getcomposer.org/):

``` bash
composer require eolica/laravel-hubspot
```

Once installed, if you are not using automatic [package discovery](https://laravel.com/docs/8.x/packages#package-discovery), then you need to register the `Eolica\LaravelHubspot\HubspotServiceProvider` service provider in your `config/app.php`.

``` php
'providers' => [
    ...

    /*
    * Package Service Providers...
    */
    Eolica\LaravelHubspot\HubspotServiceProvider::class,

    ...
],
```

You can also optionally alias our facade:

``` php
'aliases' => [
    ...

    'Hubspot' => Eolica\LaravelHubspot\Facades\Hubspot::class,

],
```

## Configuration

This package makes use of the [Laravel Manager Package](https://github.com/GrahamCampbell/Laravel-Manager) by [Graham Campbell](https://github.com/GrahamCampbell) that allows us to configure and use multiple connections of the HubSpot API in the same application.

To get started, you will need to publish the hubspot config file

``` bash
php artisan vendor:publish --provider="Eolica\LaravelHubspot\HubspotServiceProvider" --tag="config"
```

This will create a `config/hubspot.php` file in your app that you can modify to set your configuration.

This is an example of the config file:

``` php
return [
    'default' => 'main',

    'connections' => [
        'main' => [
            'config' => [
                'key' => '',
            ],
            'retry_middleware' => [
                'rate_limit' => 'constant:5',
                'internal_errors' => 'exponential:2'
            ],
            'client_options' => [
                'http_errors' => true,
            ],
            'wrap_response' => true,
        ],

        'alternative' => [
            'config' => [
                'key' => '',
                'oauth' => true,
            ],
            'retry_middleware' => [
                'rate_limit' => 'linear',
            ],
            'client_options' => [
                'http_errors' => true,
            ],
            'wrap_response' => true,
        ],
    ],
];
```

##### Default Connection Name
This option (`'default'`) is where you may specify which of the connections below you wish to use as your default connection for all work. Of course, you may use many connections at once using the manager class. The default value for this setting is `'main'`.

##### HubSpot Connections
This option (`'connections'`) is where each of the connections are setup for your application. You may add as many connections as you would like.

## Usage

##### HubspotManager
This is the class of most interest. It is bound to the ioc container as `'hubspot'` and can be accessed using the `Facades\Hubspot` facade. This class implements the ManagerInterface by extending AbstractManager. The interface and abstract class are both part of [Laravel Manager](https://github.com/GrahamCampbell/Laravel-Manager) package, so you may want to go and checkout the docs for how to use the manager class over at that repo.

##### Facades\Hubspot
This facade will dynamically pass static method calls to the `'hubspot'` object in the ioc container which by default is the HubspotManager class.

##### HubspotServiceProvider
This class should be added to the providers array in `config/app.php`. This class will setup ioc bindings.

### Examples

``` php
use Eolica\LaravelHubspot\Facades\Hubspot;

Hubspot::contacts()->getByEmail("test@hubspot.com");

Hubspot::contacts()->all([
    'count'     => 10,
    'property'  => ['firstname', 'lastname'],
    'vidOffset' => 123456,
]);
```

The hubspot manager will behave like it is a `\SevenShores\Hubspot\Factory` class. If you want to call specific connections, you can do it with the `connection` method:

``` php
use Eolica\LaravelHubspot\Facades\Hubspot;

Hubspot::connection('alternative')->contacts()->getByEmail("test@hubspot.com");

Hubspot::connection('alternative')->contacts()->all([
    'count'     => 10,
    'property'  => ['firstname', 'lastname'],
    'vidOffset' => 123456,
]);
```

``` php
use Eolica\LaravelHubspot\Facades\Hubspot;

// Writing this:
Hubspot::connection('main')->contacts()->getByEmail("test@hubspot.com");

// Is identical to writing this:
Hubspot::contacts()->getByEmail("test@hubspot.com");

// And is also identical to writing this:
Hubspot::connection()->contacts()->getByEmail("test@hubspot.com");

// This is because the 'main' connection is configured to be the default
Hubspot::getDefaultConnection(); // This will return 'main'

// We can change the default connection
Hubspot::setDefaultConnection('alternative'); // The default is now 'alternative'
```

If you prefer to use dependency injection over facades, then you can easily inject the manager like so:

``` php
use Illuminate\Support\Facades\App;
use Eolica\LaravelHubspot\HubspotManager;

final class Example
{
    private $hubspot;

    public function __construct(HubspotManager $hubspot)
    {
        $this->hubspot = $hubspot;
    }

    public function method()
    {
        $this->hubspot->contacts()->getByEmail("test@hubspot.com");

        $this->hubspot->connection('alternative')->contacts()->getByEmail("test@hubspot.com");
    }
}

App::make(Example::class)->method();
```

For more information on how to use the `\SevenShores\Hubspot\Factory` class we are calling behind the scenes here, check out the docs at https://github.com/HubSpot/hubspot-php, and the manager class at https://github.com/GrahamCampbell/Laravel-Manager#usage.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover a security vulnerability within this package, please send an email at dllobellmoya@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

### Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
