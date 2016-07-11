<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Composers;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['view']->composer('layouts.admin', Composers\AddStatusMessage::class);
        $this->app['view']->composer('layouts.app', Composers\AddStatusMessage::class);
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
