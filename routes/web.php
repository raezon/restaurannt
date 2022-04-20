<?php

use App\Http\Controllers\Entity\BankController;
use App\Http\Controllers\Entity\BillController;
use App\Http\Controllers\Entity\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Entity\FoodsController;
use App\Http\Controllers\Entity\InventoryController;
use App\Http\Controllers\Entity\InvoicesController;
use App\Http\Controllers\Entity\ReportsController;
use App\Http\Controllers\Entity\RoomsController;
use App\Http\Controllers\Entity\SettingsController;
use App\Http\Controllers\Entity\ShoppingController;
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
Route::resource('bank', BankController::class);
Route::resource('bill', BillController::class);
Route::resource('customer', CustomerController::class);
Route::resource('food', FoodsController::class);
Route::resource('inventory', InventoryController::class);
Route::resource('invoices', InvoicesController::class);
Route::resource('reports', ReportsController::class);
Route::resource('rooms', RoomsController::class);
Route::resource('settings', SettingsController::class);
Route::resource('shopping', ShoppingController::class);
Route::resource('types', TypesController::class);
Route::resource('users', UsersController::class);

require __DIR__ . '/auth.php';
