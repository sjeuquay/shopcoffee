<?php

use App\Http\Controllers\Setting\CountryCodeController;
use App\Http\Controllers\Setting\CurrencyController;
use App\Http\Controllers\Setting\DeliveryMethodController;
use App\Http\Controllers\Setting\ErrorCodeController;
use App\Http\Controllers\Setting\PaymentMethodController;
use App\Http\Controllers\Setting\SequenceController;
use App\Http\Controllers\Setting\StaticBlockController;
use App\Http\Controllers\Setting\StatusController;
use App\Http\Controllers\Setting\StoreParameterController;
use App\Http\Controllers\Setting\StoreSettingController;
use App\Http\Controllers\Vendor\TypeController;
use Illuminate\Support\Facades\Route;

// SETTING GROUP
Route::group([ 'prefix' => 'setting', 'as' => 'setting.' ], function () {
    // VENDOR TYPE
    Route::resource('vendortype', TypeController::class)
        ->except('create', 'show', 'edit')
        ->parameter('vendortype', 'type');

    // CONTROLLER ERROR CODE
    Route::resource('errorcode', ErrorCodeController::class)
        ->except('create', 'show', 'edit');

    // CONTROLLER SEQUENCE
    Route::resource('sequence', SequenceController::class)
        ->except('create', 'show', 'edit');

    // STATUS
    Route::resource('status', StatusController::class)
        ->except('show');

    // CURRENCY
    Route::resource('currency', CurrencyController::class)
        ->except('create', 'show', 'edit');

    // COUNTRY CODE
    Route::resource('countrycode', CountryCodeController::class)
        ->except('create', 'show', 'edit')
        ->parameter('countrycode', 'country_code');

    // METHODS
    Route::resource('paymentmethod', PaymentMethodController::class)
        ->except('create', 'show', 'edit')
        ->parameter('paymentmethod', 'payment_method');

    // STORE PARAMETERS
    Route::resource('storeparameter', StoreParameterController::class)
        ->except('create', 'show', 'edit')
        ->parameter('storeparameter', 'store_parameter');

    // STORE SETTINGS
    Route::resource('storesetting', StoreSettingController::class)
        ->except('create', 'show', 'edit')
        ->parameter('storesetting', 'store_setting');

    // STATIC BLOCKS
    Route::resource('staticblock', StaticBlockController::class)
        ->except('create', 'show', 'edit')
        ->parameter('staticblock', 'static_block');
    // DELIVERY METHOD
    Route::resource('deliverymethod',DeliveryMethodController::class);
});
