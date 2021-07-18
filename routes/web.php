<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('_login', [AuthController::class, '_login'])->name('_login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('admin', [DashboardController::class, 'index'])->name('admin');
    Route::get('distributor', [DashboardController::class, 'index'])->name('distributor');
    Route::get('retailer', [DashboardController::class, 'index'])->name('retailer');
    Route::resource('dashboard', DashboardController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::post('beUpdate', [OrderController::class, 'beUpdate']);
    Route::post('approved/{id}', [OrderController::class, 'approved']);
    Route::post('editPoto/{id}', [DashboardController::class, 'updateFoto']);
});

Route::get('logout', [AuthController::class, 'logout']);
