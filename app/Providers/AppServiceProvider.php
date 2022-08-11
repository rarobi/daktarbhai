<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['validator']->extend('bd_phone', function ($attribute, $value, $parameters) {
            if (!preg_match('/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/', $value)) {
                return false;
            }
            return true;
        });

        \URL::forceRootUrl(config('app.url'));

        if(config('misc.force_https') == true)
        {

            \URL::forceScheme('https');
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
