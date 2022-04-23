<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ArticleRepositoryInterface;
use App\Interfaces\BillRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\FoodsRepositoryInterface;
use App\Repositories\ArticleRepository;
use App\Repositories\FoodsRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind(FoodsRepositoryInterface::class,FoodsRepository::class);
  
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
        return $this->app->bind(FoodsRepositoryInterface::class, FoodsRepository::class);
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
