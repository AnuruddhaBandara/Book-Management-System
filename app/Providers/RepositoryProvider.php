<?php

namespace App\Providers;

use App\Interface\BaseRepositoryInterface;
use App\Interface\RegisterationReposotoryInterface;
use App\Repository\BaseRepository;
use App\Repository\RegistrationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(RegisterationReposotoryInterface::class, RegistrationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
