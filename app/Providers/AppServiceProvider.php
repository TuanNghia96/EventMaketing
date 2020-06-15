<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('helper', function () {
            return new App\Facade\Helper();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(
            App\Services\EventServiceInterface::class,
            App\Services\EventService::class
        );
        $this->app->singleton(
            App\Services\UserServiceInterface::class,
            App\Services\UserService::class
        );
    }
}
