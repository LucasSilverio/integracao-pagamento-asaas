<?php

namespace App\Providers;

use App\Services\Asaas\{
    CheckoutService
};
use App\Services\{
    CheckOutServiceInterface
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            CheckOutServiceInterface::class,
            CheckoutService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
