<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Api\CustomerApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Customers
    Route::resource('customers', CustomerController::class);
    Route::get('customers/export/csv', [CustomerController::class, 'exportCsv'])->name('customers.export-csv');
    Route::get('customers/export/pdf', [CustomerController::class, 'exportPdf'])->name('customers.export-pdf');

    // Orders
    Route::resource('orders', OrderController::class);
    Route::get('orders/export/csv', [OrderController::class, 'exportCsv'])->name('orders.export-csv');
    Route::get('orders/export/pdf', [OrderController::class, 'exportPdf'])->name('orders.export-pdf');

    // Admin only routes
    Route::middleware('admin')->group(function () {
        // Add admin-only features here
    });
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('api/customers', CustomerApiController::class);
});
