<?php

namespace App\Providers;

use App\Repository\Auth\Interfaces\AuthRepositoryInterface;
use App\Repository\Employee\EloquentAuthRepository;
use App\Repository\Job\EloquentJobRepository;
use App\Repository\Job\Interfaces\JobRepositoryInterface;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(JobRepositoryInterface::class, EloquentJobRepository::class);
        $this->app->bind(AuthRepositoryInterface::class, EloquentAuthRepository::class);
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       
    }
}
