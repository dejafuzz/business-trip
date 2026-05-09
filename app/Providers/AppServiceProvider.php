<?php

namespace App\Providers;

use App\repositories\BusinessTripsRepository;
use App\repositories\CitiesRepository;
use App\repositories\interfaces\BusinessTripsRepositoryInterface;
use App\repositories\interfaces\CitiesRepositoryInterface;
use App\Repositories\interfaces\RoleRepositoryInterface;
use App\repositories\interfaces\UserRepositoryInterface;
use App\repositories\RoleRepository;
use App\repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );
        $this->app->bind(
            RoleRepositoryInterface::class,
            RoleRepository::class
        );
        $this->app->bind(
            BusinessTripsRepositoryInterface::class,
            BusinessTripsRepository::class
        );
        $this->app->bind(
            CitiesRepositoryInterface::class,
            CitiesRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}