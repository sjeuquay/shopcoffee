<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\layout\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Order\OrderController;

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::fallback(function () {
    return redirect()->route('home');
});
Route::get('/shopmachines', function () {
    return view('client.shop.shopMachines');
})->name('shopMachines');

Route::get('/about', function () {
    return view('client.layout.about');
})->name('about');


Route::post('/product', [ProductController::class, 'inredient'])->name('inredient');

Route::get('/shopcoffee/{id?}', [ProductController::class, 'shopCoffee'])->name('coffee');

Route::get('/feedback', function () {
    return view('client.layout.feedback');
})->name('feedback');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

Route::post('/contact', [ContactController::class, 'PostContact'])->name('Postcontact');
Route::post('/product', [ProductController::class, 'inredient'])->name('inredient');

Route::get('/product/{id}/{id_C}', [ProductController::class, 'productDetail'])->name('product');

Route::get('/shopaccessoris', function () {
    return view('client.shop.shopAccessoris');
})->name('shopaccessoris');

Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/apply-promotion', [OrderController::class,'applyPromotion'])->name('apply-promotion');

Route::get('/shipping', [OrderController::class,'shipping'])->name('shipping');
Route::put('/editAddressShipping', [OrderController::class,'editShipAddress'])->name('editAddressShipping');


Route::get('/payment', function () {
    return view('client.checkout-orders.payment');
})->name('payment');

Route::get('/review', function () {
    return view('client.checkout-orders.review');
})->name('review');

Route::get('/confimation', function () {
    return view('client.checkout-orders.confimation');
})->name('confimation');

Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('/register',[UserController::class, 'PostRegister']);

Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class, 'PostLogin'])->name('login.post');
// Route
Route::post('/reset-attempts', [UserController::class, 'resetAttempts'])->name('reset.attempts');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/nextregister', function () {
    return view('client.account.nextregister');
})->name('nextregister');

//Address
Route::get('/address', function () {
    return view('client.account.address');
})->name('address');
Route::post('/address',[UserController::class, 'addaddress'])->name('address.addaddress');
Route::get('/addaddress', function () {
    return view('client.account.addaddress');
})->name('addaddress');
Route::match(['get', 'put', 'post'], '/edit-address', [UserController::class, 'editAndUpdateAddress'])->name('edit-address');
//Cart
Route::post('/update-cart-item-quantity', [CartController::class, 'updateCartItemQuantity'])->name('update-cart-item-quantity');
Route::post('/update-addon-quantity', [CartController::class, 'updateCartAddonQuantity'])->name('update-addon-quantity');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');
Route::put('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::post('/process-checkout', [CartController::class, 'checkout'])->name('process.checkout');

//Profile
Route::put('/update',[UserController::class, 'update'])->name('update.put');
Route::put('/changepassword',[UserController::class, 'changePassword'])->name('change.password');
Route::get('/profile', function () {
    return view('client.account.profile');
})->name('profile');

Route::get('/order-details/{id}', [OrderController::class, 'getOrderDetails'])->name('detail');
Route::post('/reset-session', [OrderController::class ,'reset'])->name('reset.session');
Route::post('/update-session', [OrderController::class, 'updateSession'])->name('update_session');

Route::get('/orderhistory', [OrderController::class, 'orderHistory'])->name('orderhistory');

Route::get('/checkoutpreferences', function () {
    return view('client.account.checkoutpreferences');
})->name('checkoutpreferences');

Route::get('/agency', function () {
    return view('client.layout.agency');
})->name('agency');

Route::get('/forgotpass', function () {
    return view('client.account.forgotpass');
})->name('forgotpass');
