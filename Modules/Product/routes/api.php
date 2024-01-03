<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\app\Http\Controllers\ImagesController;
use Modules\Product\app\Http\Controllers\ProductController;
use Modules\Product\app\Http\Controllers\CategoriesController;
use Modules\Product\app\Http\Controllers\AttributeValueController;
use Modules\Product\app\Http\Controllers\ProductAttributeController;

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

Route::get('products', [ProductController::class, 'index']);
Route::get('categories', [CategoriesController::class, 'index']);
Route::get('attributes', [ProductAttributeController::class, 'index']);
Route::get('attribvalues', [AttributeValueController::class, 'index']);
Route::post('images',[ImagesController::class, 'imageUpload']);

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

    //ProductAttribute CRUD route
    Route::post('attributes', [ProductAttributeController::class, 'store']);
    Route::put('attributes/{id}', [ProductAttributeController::class, 'update']);
    Route::delete('attributes/{id}', [ProductAttributeController::class, 'delete']);

    //AttributeValue CRUD route
    Route::post('attribvalues', [AttributeValueController::class, 'store']);
    Route::put('attribvalues/{id}', [AttributeValueController::class, 'update']);
    Route::delete('attribvalues/{id}', [AttributeValueController::class, 'delete']);

});
