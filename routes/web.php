<?php

use App\Http\Controllers\{
    CheckoutController,
    HomeController
};

use Illuminate\Support\Facades\Route;


Route::resource('/', HomeController::class);

/**
 * Checkout
 */
Route::post('/checkout/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::get('/checkout/{paymentId}/thanks', [CheckoutController::class, 'thanks'])->name('checkout.thanks');