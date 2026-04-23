<?php

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
    return view('welcome');
});

use App\Http\Controllers\Admin\ProductController;

Route::prefix('admin')->group(function () {

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/delete/{id}', [ProductController::class, 'delete']);
    Route::get('/products/trash', [ProductController::class, 'trash']);
    Route::get('/products/restore/{id}', [ProductController::class, 'restore']);

});

Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);