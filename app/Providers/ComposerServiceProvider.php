<?php

namespace App\Providers;

use App\Http\ViewComposers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            ['frontend.layouts.theme.partials.header', 'frontend.layouts.theme.partials.sidebar', 'frontend.pages.subscription*', 'frontend.pages.askdoctor.questionform', 'frontend.pages.premium.index'], ProfileComposer::class
        );

        // Using Closure based composers...
//        View::composer('dashboard', function ($view) {
//            //
//        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}