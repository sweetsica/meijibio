<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;
use App\Http\Controllers\AuthenticateController;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleController;



##########################################################################################################################################
// Route::get('/', function () {
//     return view('welcome');
// });

##########################################################################################################################################
//Static pages
// Route::get('/login', [StaticPageController::class, 'login'])->name('static.login');
// Route::get('/register', [StaticPageController::class, 'register'])->name('static.register');
// Route::get('/', [StaticPageController::class, 'index'])->name('static.index');

##########################################################################################################################################
//Test routes
// Route::post('/test', [ForwardController::class, 'index'])->name('test.index');
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin-only', [StaticPageController::class, 'adminOnly'])->name('admin.only');
// });
// Route::middleware(['auth', 'role:admin|user'])->group(function () {
//     Route::get('/admin-user', [StaticPageController::class, 'adminUser'])->name('admin.user');
// }); //Dùng Spatie Laravel để check quyền - không trả thông báo - Phải thêm middleware tay để custom notice

Route::get('/admin-only', [StaticPageController::class, 'adminOnly'])->name('admin.only');
Route::get('/admin-user', [StaticPageController::class, 'adminUser'])->name('admin.user');



Route::get('/testlogin', [StaticPageController::class,'testlogin']);
Route::post('/checktestlogin', [StaticPageController::class,'checktestlogin'])->name('test.login');
Route::get('/clear',function(){
    Auth::logout();
    Session::flush();
    return redirect('/testlogin');
})->name('clear');
Route::get('/logout',function(){
    Auth::logout();
    Session::flush();
    return redirect('/');
})->name('logout');

##########################################################################################################################################
// Webhook route
Route::match(['get', 'post'], '/webhook', [StaticPageController::class, 'webhook'])->name('static.webhook');

Route::post('/post-test', [StaticPageController::class, 'post_test'])->name('static.post_test');


##########################################################################################################################################
//html template
Route::get('/blank', function () {
    return view('static.dashboard');
})->name('blank');


##########################################################################################################################################
//logs function
Route::get('/logs', [LogController::class, 'index'])->name('logs.index');


##########################################################################################################################################
//login route
Route::get('/', [AuthenticateController::class, 'index'])->name('login');
Route::post('/logincheck', [AuthenticateController::class, 'logincheck'])->name('login.check');


##########################################################################################################################################
//Dashboard function
// Route::get('/dashboard/crm', function () {
//     return view('static.index');
// })->name('dashboard.crm');
Route::get('/dashboard/crm', function () {
    return view('dashboard.crm');
})->name('dashboard.crm');


##########################################################################################################################################
//Customer routes
Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customers/view/{id?}', [CustomerController::class, 'view'])->name('customer.view');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customers/store', [CustomerController::class, 'createCustomer'])->name('customer.store');
Route::put('/customers/{id}/update', [CustomerController::class, 'updateCustomer'])->name('customer.update');
Route::delete('/customers/{id}', [CustomerController::class, 'deleteCustomer'])->name('customer.delete');

// Customer sync routes for web access - require authentication
Route::middleware(['auth'])->group(function () {
    Route::post('/customers/sync-customer', [CustomerController::class, 'syncCustomer'])->name('web.customer.sync');
    Route::post('/customers/sync-customer/{id}', [CustomerController::class, 'syncDetailCustomer'])->name('web.customer.sync.detail');
    Route::post('/customers/sync-by-getfly-id/{getflyId}', [CustomerController::class, 'syncCustomerByGetflyId'])->name('web.customer.sync.by.getfly.id');
});






//Lead routes - TODO: Implement Lead functionality
// Route::get('/leads', [CustomerController::class, 'indexLead'])->name('lead.index');
// Route::get('/leads/view', [CustomerController::class, 'viewLead'])->name('lead.view');
// Route::get('/leads/create', [CustomerController::class, 'createLead'])->name('lead.create');


##########################################################################################################################################

// Role CRUD
Route::resource('roles', RoleController::class)->only(['index', 'create', 'store', 'destroy']);

// Gán role cho user
Route::get('/users/{id}/role', [UserRoleController::class, 'edit'])->name('users.editRole');
Route::put('/users/{id}/role', [UserRoleController::class, 'update'])->name('users.updateRole');



##########################################################################################################################################

Route::get('/test-role',function(){
    dd(auth()->user());
})->name('test.role');



##########################################################################################################################################

Route::get('/customers/export', [CustomerController::class, 'export'])->name('customers.export');

##########################################################################################################################################
