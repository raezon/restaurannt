<?php

use App\Http\Controllers\Logic\TransactionController;
use App\Http\Controllers\Logic\BillController;
use App\Http\Controllers\Logic\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Logic\CategoryController;
use App\Http\Controllers\Logic\FoodController;
use App\Http\Controllers\Logic\IngrediantController;
use App\Http\Controllers\Logic\PlatsController;
use App\Http\Controllers\Logic\InventoryController;
use App\Http\Controllers\Logic\InvoicesController;
use App\Http\Controllers\Logic\OrderController;
use App\Http\Controllers\Logic\PackController;
use App\Http\Controllers\Logic\ReportsController;
use App\Http\Controllers\Logic\RoomsController;
use App\Http\Controllers\Logic\SettingsController;
use App\Http\Controllers\Logic\TypesController;
use App\Http\Controllers\Logic\UsersController;
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
//post
Route::post('/bill/view', [BillController::class, 'show'])
    ->name('billView');
Route::post('/foods/store', [FoodController::class, 'store'])
    ->name('FoodStore');
Route::post('/rooms/store', [RoomsController::class, 'store'])
->name('RoomStore');
Route::post('/inventory/store', [InventoryController::class, 'store'])
    ->name('InventoryStore');
Route::post('/plats/store', [PlatsController::class, 'store'])
    ->name('PlatStore');
Route::post('/packs/store', [PackController::class, 'store'])
    ->name('PackStore');
Route::get('/packs/show', [PackController::class, 'index'])
    ->name('Packs');
Route::post('/categories/store', [CategoryController::class, 'store'])
    ->name('CategoriesStore');

//entities controller
Route::middleware('isAdmin')->group(function () {
    Route::resource('bill', BillController::class);
});

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware'=>'isAdmin','prefix'=>'gestion','as'=>'gestion'],function(){
        
    });
   
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
});



require __DIR__ . '/auth.php';
