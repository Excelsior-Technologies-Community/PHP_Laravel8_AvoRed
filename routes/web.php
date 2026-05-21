<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::post('/products/delete/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
    Route::get('/products/trash', [ProductController::class, 'trash'])->name('admin.products.trash');
    Route::get('/products/restore/{id}', [ProductController::class, 'restore'])->name('admin.products.restore');
    Route::post('/products/force-delete/{id}', [ProductController::class, 'forceDelete'])->name('admin.products.force-delete');

});