<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\app\Http\Controllers\CategoriesController;
use Modules\Product\app\Http\Controllers\ProductController;

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
//Public route
// Route::get('product', fn (Request $request) => $request->user())->name('product');
Route::get('products', [ProductController::class, 'index']);
Route::get('categories', [CategoriesController::class, 'index']);

//Protected route
Route::middleware(['auth:sanctum'])->name('api.')->group(function () {

    //Product CRUD route
    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{id}', [ProductController::class, 'update']);
    Route::delete('products/{id}', [ProductController::class, 'delete']);

    //Category CRUD route
    Route::post('categories', [CategoriesController::class, 'store']);
    Route::put('categories/{id}', [CategoriesController::class, 'update']);
    Route::delete('categories/{id}', [CategoriesController::class, 'delete']);

});
