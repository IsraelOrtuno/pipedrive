<?php

namespace Devio\Pipedrive;

use Devio\Pipedrive\Exceptions\PipedriveException;
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
        $this->app->singleton('pipedrive', function ($app) {
            $token = $app['config']->get('services.pipedrive.token');

            if (! $token) {
                throw new PipedriveException('Pipedrive was not configured in services.php configuration file.');
            }

            return new Pipedrive($token);
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return ['pipedrive'];
    }
}
