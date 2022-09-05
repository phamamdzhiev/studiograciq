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
    return view('app');
});

Route::group(['middleware' => 'auth:web', 'prefix' => 'admin'], function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/products', [\App\Http\Controllers\AdminController::class, 'products'])->name('admin.products');
    Route::post('/products', [\App\Http\Controllers\AdminController::class, 'storeProducts'])->name('post.admin.products');
    Route::get('/categories', [\App\Http\Controllers\AdminController::class, 'categories'])->name('admin.categories');
    Route::post('/categories', [\App\Http\Controllers\ProductsCategoryController::class, 'store'])->name('post.admin.categories');
    Route::get('/appointments', [\App\Http\Controllers\AdminController::class, 'appointments'])->name('admin.appointments');
    Route::post('/appointments', [\App\Http\Controllers\AdminController::class, 'storeAppointments'])->name('post.admin.appointments');
    Route::get('/services', [\App\Http\Controllers\AdminController::class, 'services'])->name('admin.services');
    Route::post('/services', [\App\Http\Controllers\AdminController::class, 'storeServices'])->name('post.admin.services');
    Route::get('/customers', [\App\Http\Controllers\AdminController::class, 'customers'])->name('admin.customers');
    Route::post('/customers', [\App\Http\Controllers\AdminController::class, 'storeCustomers'])->name('post.admin.customers');
    Route::get('/orders', [\App\Http\Controllers\AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/order/{id}', [\App\Http\Controllers\AdminController::class, 'order'])->name('admin.order');
    Route::post('/order/{id}/status', [\App\Http\Controllers\AdminController::class, 'changeOrderStatus'])->name('admin.order.status');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
