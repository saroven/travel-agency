<?php

namespace App\Providers;

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
    public function boot(): void
    {
        if (config('app.key') && \Schema::hasTable('settings')) {
            $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
            view()->share('settings', $settings);
        }
    }
}
