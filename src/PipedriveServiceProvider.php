<?php

namespace Devio\Pipedrive;

use Devio\Pipedrive\Exceptions\PipedriveException;
use Illuminate\Contracts\Container\Container as ContainerContract;
use Illuminate\Support\ServiceProvider;

class PipedriveServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Pipedrive::class, function (ContainerContract $app) {
            $token = $app->make('config')->get('services.pipedrive.token');

            if (! $token) {
                throw new PipedriveException('Pipedrive was not configured in services.php configuration file.');
            }

            return new Pipedrive($token, $app->make('config')->get('services.pipedrive.mappings',[]));
        });

        $this->app->alias(Pipedrive::class, 'pipedrive');
    }

    /**
     * @return array
     */
    public function provides()
    {
        return ['pipedrive'];
    }
}
