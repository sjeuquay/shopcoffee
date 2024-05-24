<?php

use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;
//Promotion
Route::resource('promotion', PromotionController::class);
