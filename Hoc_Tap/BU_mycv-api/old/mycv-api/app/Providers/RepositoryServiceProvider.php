<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Services\Languages\LanguagesInterface;
use App\Repositories\LanguagesRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LanguagesInterface::class, LanguagesRepository::class);    
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
