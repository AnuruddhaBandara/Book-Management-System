<?php

namespace App\Providers;

use App\Interface\BaseRepositoryInterface;
use App\Interface\BookingBorrowRepositoryInterface;
use App\Interface\BookingRepositoryInterface;
use App\Interface\StaffRegisterationReposotoryInterface;
use App\Interface\ReaderRegistrationRepositoryInterface;
use App\Repository\BaseRepository;
use App\Repository\BookingBorrowRepository;
use App\Repository\BookingRepository;
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
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->bind(BookingBorrowRepositoryInterface::class, BookingBorrowRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
