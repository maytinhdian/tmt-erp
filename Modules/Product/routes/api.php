<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::get('products',[ProductController::class,'index']);

//Protected route
Route::middleware(['auth:sanctum'])->name('api.')->group(function () {
    Route::post('products',[ProductController::class,'store']);
     Route::put('products/{id}',[ProductController::class,'update']);
     Route::delete('products/{id}',[ProductController::class,'delete']);
});
