<?php
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

// Route::group([ 'prefix' => 'vendor', 'as' => 'vendor.' ], function () {
//     //
// });

// VENDOR
Route::resource('vendor', VendorController::class);
