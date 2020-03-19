<?php

namespace Ruishuang\QCloudLaravel;

use Illuminate\Support\ServiceProvider;
use Ruishuang\QCloudLaravel\QCloud\Client;

class QCloudServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Config file path.
        $dist = __DIR__.'/../config/qcloud_sms.php';

        // If we're installing in to a Lumen project, config_path
        // won't exist so we can't auto-publish the config
        if (function_exists('config_path')) {
            // Publishes config File.
            $this->publishes([
                $dist => config_path('qcloud_sms.php'),
            ]);
        }

        // Merge config.
        $this->mergeConfigFrom($dist, 'qcloud_sms');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind QCloud Client in Service Container.
        $this->app->singleton(Client::class, function ($app) {
            if (! $app['config']->has('qcloud_sms')) {
                throw new \RuntimeException('Missing qcloud_sms configuration section. ');
            }

            if (! $app['config']->has('qcloud_sms.app_id')) {
                throw new \RuntimeException('You need to provide a app_key. ');
            }

            if (! $app['config']->has('qcloud_sms.app_key')) {
                throw new \RuntimeException('You need to provide a app_key. ');
            }

            return new Client(
                $app['config']->get('qcloud_sms.app_id'),
                $app['config']->get('qcloud_sms.app_key')
            );
        });
    }
}
