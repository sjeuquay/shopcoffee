<?php

use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\OrderDetailController;
use Illuminate\Support\Facades\Route;
//Order
Route::prefix('orders')->name('orders.')->group(function () {
    Route::resource('list', OrderController::class);
    Route::resource('detail', OrderDetailController::class);
    Route::get('apply', [OrderController::class,'apply'])->name('apply');
    Route::get('cancel', [OrderController::class,'cancel'])->name('cancel');
});