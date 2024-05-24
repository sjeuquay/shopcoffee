<?php

use App\Http\Controllers\Equipment\BranchController;
use App\Http\Controllers\Equipment\EquipmentController;
use Illuminate\Support\Facades\Route;

// EQUIPMENT
Route::group([ 'prefix' => 'equipment', 'as' => 'equipment.' ], function () {
    // BRANCH
    Route::resource('branch', BranchController::class)
        ->except('create', 'show', 'edit');

});

Route::resource('equipment', EquipmentController::class)
->except('create','edit');
