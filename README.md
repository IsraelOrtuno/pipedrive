# Pipedrive API library for PHP

[![Build Status](https://travis-ci.org/IsraelOrtuno/pipedrive.svg)](https://travis-ci.org/IsraelOrtuno/pipedrive)

This package provides a complete API client library for working with Pipedrive CRM. It includes all the resources listed at Pipedrive's documentation.

## Installation

### Require the package with composer

You can install the package via `composer require` command:

```shell
composer require devio/properties
```

Or simply add it to your composer.json dependences and run `composer update`:

```json
"require": {
    ...
    "devio/pipedrive": "dev-master"
    ...
}
```

## Using with Laravel Framework

### Service Provider and Facade

Only if using Laravel Framework you should include the `PipedriveServiceProvider` to the providers array in `config/app.php` and register the Laravel Facade.

```php
'providers' => [
  ...
  Devio\Pipedrive\PipedriveServiceProvider::class,
  ...
],
'alias' => [
    ...
    'Pipedrive' => 'Devio\Pipedrive\PipedriveFacade::class'
    ...
]
```

### The service configuration

Laravel includes a configuration file for storing external services information at `config/services.php`. We have to set up our Pipedrive token at that file like this:

```php
'pipedrive' => [
    'token' => 'the pipedrive token'
]
```

Of course, as many other config parameters, you could store the token at your `.env` file or environment variable and fetch it using `dotenv`:

```php
'pipedrive' => [
    'token' => dotenv('PIPEDRIVE_TOKEN')
]
```