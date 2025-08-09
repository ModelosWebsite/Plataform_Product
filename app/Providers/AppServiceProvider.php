<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CompanyRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Binding do CompanyRepository como singleton para injeção automática

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
