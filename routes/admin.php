<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('dashboard', [ AdminController::class, 'index' ])->name('dashboard');

// Redirect to dashboard on accessing admin
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});
// Fallback route
Route::fallback(function () {
    return redirect()->route('admin.dashboard');
});

// Include additional route files
require_once __DIR__ . '/admin/setting.php';
require_once __DIR__ . '/admin/vendor.php';
require_once __DIR__ . '/admin/equipment.php';
require_once __DIR__ . '/admin/slider.php';
require_once __DIR__ . '/admin/promotion.php';
require_once __DIR__ . '/admin/user.php';
require_once __DIR__ . '/admin/category.php';
require_once __DIR__ . '/admin/product.php';
require_once __DIR__ . '/admin/order.php';
