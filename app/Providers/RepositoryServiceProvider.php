<?php

namespace App\Providers;

use App\Repositories\Contracts\BikeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

use App\Repositories\BikeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BikeRepositoryInterface::class,BikeRepository::class);
    }
}
