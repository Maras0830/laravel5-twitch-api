<?php
namespace Maras0830\TwitchApi\Providers;
use Illuminate\Support\ServiceProvider;
/**
 * Class TwitchApiServiceProvider
 * @package Skmetaly\TwitchApi\Providers
 */
class ApiServiceProvider extends ServiceProvider  {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServices();
    }
    /**
     *  Boot
     */
    public function boot()
    {
       $this->addConfig();
    }
    /**
     *  Registering services
     */
    private function registerServices()
    {
        $this->app->bind('Maras0830\TwitchApi\Services\ApiService','Maras0830\TwitchApi\Services\ApiService');
    }
    /**
     *  Config publishing
     */
    private function addConfig()
    {
        $this->publishes([
            __DIR__.'/../../config/twitch-api.php' => config_path('twitch-api.php')
        ]);
    }
}