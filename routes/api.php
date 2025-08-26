<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\CustomerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/webhook', [LogController::class, 'webhook']);


//Import customers - Protected by auth:sanctum middleware
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/customers/import', [CustomerController::class, 'import'])->name('customer.import');
    Route::put('/customers/{id}/update', [CustomerController::class, 'updateCustomer'])->name('api.customer.update');
    Route::post('/customers/sync-customer', [CustomerController::class, 'syncCustomer'])->name('customer.sync');
    Route::post('/customers/sync-customer/{id}', [CustomerController::class, 'syncDetailCustomer'])->name('api.customer.sync.detail');
});

