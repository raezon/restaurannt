<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\BillRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CustomerRepositoryInterface;
use App\Interfaces\FoodRepositoryInterface;
use App\Interfaces\IngrediantRepositoryInterface;
use App\Interfaces\InventoryRepositoryInterface;
use App\Interfaces\InvoicesRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\PackRepositoryInterface;
use App\Interfaces\PlatRepositoryInterface;
use App\Interfaces\ReportsRepositoryInterface;
use App\Interfaces\RoomsRepositoryInterface;
use App\Interfaces\SettingsRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Settings;
use App\Repositories\BillRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\FoodRepository;
use App\Repositories\IngrediantRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\InvoicesRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PackRepository;
use App\Repositories\PlatRepository;
use App\Repositories\ReportsRepository;
use App\Repositories\RoomsRepository;
use App\Repositories\SettingsRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\UsersRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        $this->registerBilling();
        $this->registerCategory();
        $this->registerCustomer();
        $this->registerFoods();
        $this->registerInventory();
        $this->registerIngrediants();
        $this->registerInvoices();
        $this->registerPlat();
        $this->registerPack();
        $this->registerOrders();
        $this->registerReports();
        $this->registerRooms();
        $this->registerTransaction();
        $this->registerUser();
        $this->registerSettings();
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
        return $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
    }
    public function registerIngrediants()
    {
        return $this->app->bind(IngrediantRepositoryInterface::class, IngrediantRepository::class);
    }
    public function registerFoods()
    {
        return $this->app->bind(FoodRepositoryInterface::class, FoodRepository::class);
    }
    public function registerPlat()
    {
        return $this->app->bind(PlatRepositoryInterface::class, PlatRepository::class);
    }
    public function registerPack()
    {
        return $this->app->bind(PackRepositoryInterface::class, PackRepository::class);
    }
    public function registerInventory()
    {
        return $this->app->bind(InventoryRepositoryInterface::class, InventoryRepository::class);
    }
    public function registerInvoices()
    {
        return $this->app->bind(InvoicesRepositoryInterface::class, InvoicesRepository::class);
    }

    public function registerOrders()
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
    }
    public function registerRooms()
    {
        $this->app->bind(RoomsRepositoryInterface::class, RoomsRepository::class);
    }
    public function registerReports()
    {
        $this->app->bind(ReportsRepositoryInterface::class, ReportsRepository::class);
    }
    public function registerTransaction()
    {
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
    }
    public function registerUser()
    {
        $this->app->bind(UserRepositoryInterface::class, UsersRepository::class);
    }

    public function registerSettings()
    {
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
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
