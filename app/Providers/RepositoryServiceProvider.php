<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ArticleRepositoryInterface;
use App\Interfaces\BillRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\PlatRepositoryInterface;
use App\Repositories\PlatRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind(PlatRepositoryInterface::class,PlatRepository::class);
  
    }

    public function registerBilling()
    {
        return $this->app->bind(BillRepositoryInterface::class, BillRepository::class);
    }

    public function registerCategory()
    {
        return $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    public function registerCustomer()
    {
        return $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    public function registerFoods()
    {
        return $this->app->bind(PlatRepositoryInterface::class, PlatRepository::class);
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
