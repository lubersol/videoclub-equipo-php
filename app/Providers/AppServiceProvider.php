<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\NullStore;
use Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //if ($this->app->isLocal()) {
            //if local register your services you require for development
                // $this->app->register('Barryvdh\Debugbar\ServiceProvider');
           // } else {
            //else register your services you require for production
            //}
            
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['request']->server->set('HTTPS', true);

        Cache::extend('none', function ($app) {
            return Cache::repository(new NullStore);
        });

    }
}
