<?php

namespace App\Providers;

use App\Repository\Job\EloquentJobRepository\EloquentJobRepository;
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
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       
    }
}
