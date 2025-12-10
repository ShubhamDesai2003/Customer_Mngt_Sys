<?php

use App\Http\Controllers\Api\CustomerApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Customer API Routes
    Route::get('/customers', [CustomerApiController::class, 'index'])->name('api.customers.index');
    Route::post('/customers', [CustomerApiController::class, 'store'])->name('api.customers.store');
    Route::get('/customers/{customer}', [CustomerApiController::class, 'show'])->name('api.customers.show');
    Route::put('/customers/{customer}', [CustomerApiController::class, 'update'])->name('api.customers.update');
    Route::delete('/customers/{customer}', [CustomerApiController::class, 'destroy'])->name('api.customers.destroy');
});
