<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Repositories\BillRepositoryInterface;
use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Interfaces\Repositories\CustomerRepositoryInterface;
use App\Interfaces\Repositories\FoodRepositoryInterface;
use App\Interfaces\Repositories\IngrediantRepositoryInterface;
use App\Interfaces\Repositories\InventoryRepositoryInterface;
use App\Interfaces\Repositories\InvoicesRepositoryInterface;
use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Interfaces\Repositories\PackRepositoryInterface;
use App\Interfaces\Repositories\PlatRepositoryInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Repositories\ReportsRepositoryInterface;
use App\Interfaces\Repositories\RoomsRepositoryInterface;
use App\Interfaces\Repositories\SettingsRepositoryInterface;
use App\Interfaces\Repositories\TransactionRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Repositories\ProductPackRepositoryInterface;
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
use App\Repositories\ProductRepository;
use App\Repositories\ReportsRepository;
use App\Repositories\RoomsRepository;
use App\Repositories\SettingsRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\UsersRepository;
use App\Repositories\PackProductRepository;

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
        $this->registerProduct();
        $this->registerPackProduct();
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

    public function registerProduct()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }
    public function registerSettings()
    {
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
    }
    public function registerPackProduct()
    {
        $this->app->bind(ProductPackRepositoryInterface::class, PackProductRepository::class);
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
