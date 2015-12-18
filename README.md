# Pipedrive API library for PHP

[![Build Status](https://travis-ci.org/IsraelOrtuno/pipedrive.svg)](https://travis-ci.org/IsraelOrtuno/pipedrive)

This package provides a complete **framework agnostic** Pipedrive CRM API client library for PHP. It includes all the resources listed at Pipedrive's documentation.

> NOTE: This package is still under development. It is in a pretty stable stage now. I am currently working on docs.

- Installation
- Usage
    - Set up the Pipedrive token
    - Available resources
- Configure and use with Laravel

## Installation

You can install the package via `composer require` command:

```shell
composer require devio/pipedrive
```

Or simply add it to your composer.json dependences and run `composer update`:

```json
"require": {
    "devio/pipedrive": "^0.2.0"
}
```

## Usage

### Available resources

:white_check_mark: Completed / :warning: Pipedrive API errors

Any Pipedrive API error has been reported and waiting fix / response for implementing the missing methods.

| Resource                  | Methods implemented       | Notes         |
|:--------------------------|:--------------------------|:--------------|
| Activities                | :white_check_mark: 6/6    | |
| ActivityTypes             | :white_check_mark: 5/5    | |
| Currencies                | :white_check_mark: 1/1    | |
| DealFields                | :white_check_mark: 25/25  | |
| Deals                     | :white_check_mark: 6/6    | |
| EmailMessages             | :white_check_mark: 4/4    | |
| EmailThreads              | :white_check_mark: 6/6    | |
| Files                     | :white_check_mark: 8/8    | |
| Filters                   | :white_check_mark: 6/6    | |
| GlobalMessages            | :white_check_mark: 2/2    | |
| Goals                     | :warning: 5/6             | Missing goal results method |
| Notes                     | :white_check_mark: 5/5    | |
| OrganizationFields        | :white_check_mark: 6/6    | |
| OrganizationRelationships | :white_check_mark: 5/5    | |
| Organizations             | :white_check_mark: 18/18  | |
| PermissionsSets           | :white_check_mark: 6/6    | |
| PersonFields              | :white_check_mark: 18/20  | |
| Persons                   | :warning: 18/20           | Missing `add` and `delete` pictures as getting required fields error. |
| Pipelines                 | :warning: 6/8             | Missing deals conversion rates and deals movements |
| ProductFields             | :white_check_mark: 6/6    | |
| Products                  | :white_check_mark: 9/9    | |
| PushNotifications         | :white_check_mark: 4/4    | |
| Recents                   | :white_check_mark: 1/1    | |
| Roles                     | :warning: 0/11            | Getting unathorized access |
| SearchResults             | :white_check_mark: 2/2    | |
| Stages                    | :white_check_mark: 7/7    | |
| UserConnections           | :white_check_mark: 1/1    | |
| Users                     | :warning: 13/20           | Getting unathorized access when playing with roles and permissions |
| UserSettings              | :white_check_mark: 1/1    | |

## Configure and use in Laravel

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
    'Pipedrive' => Devio\Pipedrive\PipedriveFacade::class,
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
    'token' => env('PIPEDRIVE_TOKEN')
]
```

### Use it

The only particularity about using this package in Laravel is we can make use of the included Facade and do not have to worry about instantiation:

```php 
$organizations = Pipedrive::organizations()->all();
//
Pipedrive::persons()->add(['name' => 'Jon Doe']);
```

