<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\MediaLibrary\PathGenerator\PathGenerator;
use App\Services\MediaLibrary\CustomPathGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // spatie media library path generator
        $this->app->bind(PathGenerator::class, CustomPathGenerator::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}