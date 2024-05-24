<?php

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductImageController;
use App\Http\Controllers\Product\ProductIngredientController;
use App\Http\Controllers\Product\ProductRelatedController;
use App\Http\Controllers\Product\SizeTypeController;
use App\Http\Controllers\Product\SpecificationController;
use App\Http\Controllers\Product\WeightTypeController;
use Illuminate\Support\Facades\Route;
//Product
Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    // Size Type
    Route::resource('sizetype', SizeTypeController::class)
        ->except('show');
    Route::resource('weightType', WeightTypeController::class)
        ->except('show');
    Route::resource('list', ProductController::class);
    Route::resource('ingredients', ProductIngredientController::class);
    // Route::get('specification/{id}', [ProductController::class, 'specification_page'])
    //     ->name('specification');

    Route::get('/specification/add/{id}', [SpecificationController::class, 'add'])
        ->name('specification.add');

    Route::resource('specification', SpecificationController::class);

    Route::resource('related', ProductRelatedController::class);
    Route::resource('image', ProductImageController::class);
});
