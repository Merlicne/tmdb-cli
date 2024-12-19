<?php

namespace App\Providers;

use App\TmdbClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TmdbClient::class, function($app){
            return new TmdbClient(
                config('api.tmdb.url'),
                config('api.tmdb.api_key'),
                config('api.tmdb.image_base_url')
            );
        });
    }
}
