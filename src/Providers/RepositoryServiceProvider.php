<?php

namespace Fuguevit\Repositories\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                realpath(__DIR__.'../../config/repository.php') => config_path('repository.php'),
            ], 'config');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        //
    }

}