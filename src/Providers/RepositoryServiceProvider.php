<?php

namespace Fuguevit\Repositories\Providers;

use Fuguevit\Repositories\Console\Commands\MakeRepositoryCommand;
use Fuguevit\repository\Console\Commands\Creators\RepositoryCreator;
use Illuminate\Support\Composer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/repository.php' => config_path('repository.php'),
        ], 'config');
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        // Register binds
        $this->registerBindings();
        // Register make repository command
        $this->registerMakeRepositoryCommand();
        // Register commands
        $this->commands(['command.repository.make']);

        $config_path = __DIR__.'/../../config/repository.php';
        // Merge config
        $this->mergeConfigFrom($config_path, 'repository');
    }

    /**
     * Register the bindings. Pre-requisite for register make repository command.
     */
    protected function registerBindings()
    {
        // FileSystem
        $this->app->instance('FileSystem', new Filesystem());

        // Composer
        $this->app->bind('Composer', function($app) {
           return new Composer($app['FileSystem']);
        });

        // RepositoryCreator
        $this->app->singleton('RepositoryCreator', function($app) {
            return new RepositoryCreator($app['FileSystem']);
        });
    }

    /**
     * Register the make:repository command.
     */
    protected function registerMakeRepositoryCommand()
    {
        // Make criteria command.
        $this->app['command.repository.make'] = $this->app->share(
            function($app) {
                return new MakeRepositoryCommand($app['RepositoryCreator']);
            }
        );
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return [
            'command.repository.make'
        ];
    }
}
