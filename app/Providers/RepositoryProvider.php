<?php

namespace App\Providers;

use App\Interface\BaseRepositoryInterface;
use App\Interface\StaffRegisterationReposotoryInterface;
use App\Interface\ReaderRegistrationRepositoryInterface;
use App\Repository\BaseRepository;
use App\Repository\StaffRegistrationRepository;
use App\Repository\ReaderRegistrationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(StaffRegisterationReposotoryInterface::class, StaffRegistrationRepository::class);
        $this->app->bind(ReaderRegistrationRepositoryInterface::class, ReaderRegistrationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
