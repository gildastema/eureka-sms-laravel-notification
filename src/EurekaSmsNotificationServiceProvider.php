<?php

namespace Eureka\SMS;

use GuzzleHttp\Client;
use Eureka\SMS\EurekaSmsChannel;
use Eureka\SMS\EurekaSmsNotification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;

class EurekaSmsNotificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('eurekasms.php'),
            ], 'config');

        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'eurekasms');

        // Register the main class to use with the facade
        $this->app->singleton(EurekaSmsNotification::class, function () {
            return new EurekaSmsNotification(new Client());
        });

        Notification::resolved(function (ChannelManager $service) {
            $service->extend('eurekasms', function () {
                return new EurekaSmsChannel();
            });
        });
    }
}
