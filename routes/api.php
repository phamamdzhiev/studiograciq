<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('appointments', [\App\Http\Controllers\AppointmentController::class, 'index'])->name('get.appointments');
Route::get('services', [\App\Http\Controllers\ServiceController::class, 'index'])->name('get.services');


Route::group(['prefix' => 'products'], function () {
    Route::get('all', [\App\Http\Controllers\ProductController::class, 'index'])->name('get.products.all');
    Route::get('categories', [\App\Http\Controllers\ProductsCategoryController::class, 'index'])->name('get.products.categories');
    Route::get('single/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('get.product.single');
});

Route::group(['prefix' => 'order'], function () {
    Route::post('create', [\App\Http\Controllers\OrderController::class, 'store'])->name('create.order');
});
