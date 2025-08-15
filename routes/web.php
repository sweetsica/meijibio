<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;


Route::get('/', function () {
    return view('welcome');
});

//Static pages
// Route::get('/login', [StaticPageController::class, 'login'])->name('static.login');
// Route::get('/register', [StaticPageController::class, 'register'])->name('static.register');
// Route::get('/', [StaticPageController::class, 'index'])->name('static.index');

//Test routes
// Route::post('/test', [ForwardController::class, 'index'])->name('test.index');

// Webhook route
Route::match(['get', 'post'], '/webhook', [StaticPageController::class, 'webhook'])->name('static.webhook');

Route::post('/post-test', [StaticPageController::class, 'post_test'])->name('static.post_test');


//html template
Route::get('/blank', function () {
    return view('static.dashboard');
})->name('blank');

//logs function
Route::get('/logs', [LogController::class, 'index'])->name('logs.index');

//Dashboard function
Route::get('/dashboard/crm', function () {
    return view('static.index');
})->name('dashboard.crm');

//Customer routes
Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');

