<?php

namespace Tylerian\Illuminate\OAuth2\Server;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;

use Laravel\Lumen\Application as LumenApplication;

class OAuth2ServerServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->registerBindings();
    }

    public function provides()
    {
        return [
        'oauth2.authfactory',
        'oauth2.factory',
        'oauth2',
        'oauth2.connection',
        ];
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/oauth2.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole())
        {
            $this->publishes([$source => config_path('oauth2.php')]);
        }

        elseif ($this->app instanceof LumenApplication)
        {
            $this->app->configure('oauth2');
        }

        $this->mergeConfigFrom($source, 'oauth2');
    }

    protected function registerBindings()
    {
        
    }
}