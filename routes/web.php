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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
