<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::resource('list', CategoryController::class);
});