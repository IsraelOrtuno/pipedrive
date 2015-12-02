# Pipedrive API library for PHP

[![Build Status](https://travis-ci.org/IsraelOrtuno/pipedrive.svg)](https://travis-ci.org/IsraelOrtuno/pipedrive)

This package provides a complete API client library for working with Pipedrive CRM. It includes all the resources listed at Pipedrive's documentation.

- Installation
- Usage
    - Set up the Pipedrive token
    - Available resources
- Configure and use with Laravel

## Installation

You can install the package via `composer require` command:

```shell
composer require devio/properties
```

Or simply add it to your composer.json dependences and run `composer update`:

```json
"require": {
    "devio/pipedrive": "dev-master"
}
```

## Usage

### Available resources

:white_check_mark: : Completed
:warning: Methods missing

| Resource                  | State                 | Notes         |
|:--------------------------|:----------------------|:--------------|
| Activities                | :white_check_mark:    | |
| ActivityTypes             | :white_check_mark:    | |
| Currencies                | :white_check_mark:    | |
| DealFields                | :white_check_mark:    | |
| Deals                     | :white_check_mark:    | |
| EmailMessages             | :white_check_mark:    | |
| EmailThreads              | :white_check_mark:    | |
| Files                     | :white_check_mark:    | |
| Filters                   | :white_check_mark:    | |
| GlobalMessages            | :white_check_mark:    | |
| Goals                     | :white_check_mark:    | |
| Notes                     | :white_check_mark:    | |
| OrganizationFields        | :white_check_mark:    | |
| OrganizationRelationships | :white_check_mark:    | |
| Organizations             | :white_check_mark:    | |
| PermissionsSets           | :white_check_mark:    | |
| PersonFields              | :white_check_mark:    | |
| Persons                   | :warning:             | `add` and `delete` person picture unavailable due to API bugs. |
| Pipelines                 | :white_check_mark:    | |
| ProductFields             | :white_check_mark:    | |
| Products                  | :white_check_mark:    | |
| PushNotifications         | :white_check_mark:    | |
| Recents                   | :white_check_mark:    | |
| Roles                     | :white_check_mark:    | |
| SearchResults             | :white_check_mark:    | |
| Stages                    | :white_check_mark:    | |
| UserConnections           | :white_check_mark:    | |
| Users                     | :white_check_mark:    | |
| UserSettings              | :white_check_mark:    | |

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

### Use it

The only particularity about using this package in Laravel is we can make use of the included Facade and do not have to worry about instantiation:

```php 
$organizations = Pipedrive::organizations()->all();
//
Pipedrive::persons()->add(['name' => 'Jon Doe']);
```

