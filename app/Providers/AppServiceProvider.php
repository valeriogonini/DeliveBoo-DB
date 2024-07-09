<?php

namespace App\Providers;
use Braintree\Gateway;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => env('BT_MERCHANT_ID'),
                    'publicKey' => env('BT_PUBLIC_KEY'),
                    'privateKey' => env('BT_PRIVATE_KEY')
                ]
            );
        });
    }
}
