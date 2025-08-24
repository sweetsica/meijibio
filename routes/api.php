<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\CustomerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/webhook', [LogController::class, 'webhook']);


//Import customers
Route::post('/customers/import', [CustomerController::class, 'import'])->name('customer.import');

Route::post('/customers/{id}/update', [CustomerController::class, 'updateCustomer']);
