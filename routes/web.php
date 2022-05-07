<?php

use App\Http\Controllers\Entity\TransactionController;
use App\Http\Controllers\Entity\BillController;
use App\Http\Controllers\Entity\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Entity\CategoryController;
use App\Http\Controllers\Entity\FoodController;
use App\Http\Controllers\Entity\IngrediantController;
use App\Http\Controllers\Entity\PlatsController;
use App\Http\Controllers\Entity\InventoryController;
use App\Http\Controllers\Entity\InvoicesController;
use App\Http\Controllers\Entity\OrderController;
use App\Http\Controllers\Entity\PackController;
use App\Http\Controllers\Entity\ReportsController;
use App\Http\Controllers\Entity\RoomsController;
use App\Http\Controllers\Entity\SettingsController;
use App\Http\Controllers\Entity\TypesController;
use App\Http\Controllers\Entity\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

//entities controller
Route::resource('bill', BillController::class);
Route::resource('customers', CustomerController::class);
Route::resource('categories', CategoryController::class);
Route::resource('foods', FoodController::class);
Route::resource('inventory', InventoryController::class);
Route::resource('invoices', InvoicesController::class);
Route::resource('ingrediants', IngrediantController::class);
Route::resource('orders', OrderController::class);
Route::resource('plats', PlatsController::class);
Route::resource('packs', PackController::class);
Route::resource('reports', ReportsController::class);
Route::resource('rooms', RoomsController::class);
Route::resource('settings', SettingsController::class);
Route::resource('transactions', TransactionController::class);
Route::resource('users', UsersController::class);

require __DIR__ . '/auth.php';
