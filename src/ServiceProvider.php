<?php

namespace Lym125\Sms\Chuanglan;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/chuanglan.php' => config_path('chuanglan.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/chuanglan.php',
            'chuanglan'
        );

        $this->app->singleton('sms.chuanglan', function ($app) {
            return new Sms($app);
        });
    }
}
