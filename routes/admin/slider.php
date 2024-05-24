<?php


use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
// Slider
Route::resource('sliders', SliderController::class);
