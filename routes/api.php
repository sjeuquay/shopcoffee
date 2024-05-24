<?php

use App\Http\Controllers\Api\CategoryApi;
use Illuminate\Support\Facades\Route;

Route::apiResource('category', CategoryApi::class)
    ->only('index', 'show');
