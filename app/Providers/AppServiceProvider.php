<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

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
    public function boot(): void
    {
        // Force HTTPS in production
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Disable SSL verification for local development
        if (app()->environment('local')) {
            Http::globalOptions([
                'verify' => false,
            ]);
        }
    }
}
