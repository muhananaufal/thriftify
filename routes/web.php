<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\auth\store\DeleteController as StoreDeleteController;
use App\Http\Controllers\auth\store\LoginController as StoreLoginController;
use App\Http\Controllers\auth\store\LogoutController as StoreLogoutController;
use App\Http\Controllers\auth\store\RegisterController as StoreRegisterController;
use App\Http\Controllers\auth\user\DeleteController as UserDeleteController;
use App\Http\Controllers\auth\user\LoginController as UserLoginController;
use App\Http\Controllers\auth\user\LogoutController as UserLogoutController;
use App\Http\Controllers\auth\user\RegisterController as UserRegisterController;
use App\Http\Controllers\store\ConfirmationController as StoreConfirmationController;
use App\Http\Controllers\store\DashboardController as StoreDashboardController;
use App\Http\Controllers\store\ProductController as StoreProductController;
use App\Http\Controllers\store\ProfileController as StoreProfileController;
use App\Http\Controllers\store\SalesController as StoreSalesController;
use App\Http\Controllers\user\CartController as UserCartController;
use App\Http\Controllers\user\CheckoutController as UserCheckoutController;
use App\Http\Controllers\user\ConfirmationController as UserConfirmationController;
use App\Http\Controllers\user\HistoryController as UserHistoryController;
use App\Http\Controllers\user\ProductController as UserProductController;
use App\Http\Controllers\user\ProfileController as UserProfileController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Routes for Store
Route::middleware(['auth:store'])->group(function () {
    Route::get('/store/dashboard', [StoreDashboardController::class, 'index'])->name('store.dashboard');
    Route::get('/store/profile', [StoreProfileController::class, 'index'])->name('store.profile.index');
    Route::get('/store/profile/edit', [StoreProfileController::class, 'edit'])->name('store.profile.edit');
    Route::put('/store/profile/update', [StoreProfileController::class, 'update'])->name('store.profile.update');
    Route::get('/store/logout', [StoreLogoutController::class, 'logout'])->name('store.logout');
    Route::post('/store/delete', [StoreDeleteController::class, 'destroy'])->name('store.delete');

    Route::get('/store/products', [StoreProductController::class, 'index'])->name('store.products.index');
    Route::get('/store/products/search', [StoreProductController::class, 'search'])->name('store.products.search');
    Route::get('/store/product/create', [StoreProductController::class, 'create'])->name('store.product.create');
    Route::post('/store/product/store', [StoreProductController::class, 'store'])->name('store.product.store');
    Route::get('/store/product/edit/{product:slug}', [StoreProductController::class, 'edit'])->name('store.product.edit');
    Route::put('/store/product/update/{product:slug}', [StoreProductController::class, 'update'])->name('store.product.update');
    Route::delete('/store/product/delete/{product:slug}', [StoreProductController::class, 'destroy'])->name('store.product.delete');
    Route::get('/store/product/details/{product:slug}', [StoreProductController::class, 'details'])->name('store.product.details');

    Route::get('/store/confirmation', [StoreConfirmationController::class, 'index'])->name('store.confirmation.index');
    Route::get('/store/confirmation/show/{order}', [StoreDashboardController::class, 'order'])->name('store.confirmation.show');
    Route::put('/store/confirmation/{order}/confirm', [StoreConfirmationController::class, 'confirm'])->name('store.confirmation.confirm');
    Route::put('/store/confirmation/{order}/reject', [StoreConfirmationController::class, 'reject'])->name('store.confirmation.reject');
    
    Route::get('/store/order/show/{order}', [StoreDashboardController::class, 'order'])->name('store.order.show');
    Route::get('/store/sales', [StoreSalesController::class, 'index'])->name('store.sales.index');
});

// Routes for User
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile', [UserProfileController::class, 'deletePictureProfile'])->name('profile.deletePictureProfile');
    Route::get('/logout', [UserLogoutController::class, 'logout'])->name('logout');
    Route::post('/delete', [UserDeleteController::class, 'destroy'])->name('delete');

    Route::get('/product/{product:slug}', [UserProductController::class, 'show'])->name('product.show');

    Route::get('/cart', [UserCartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [UserCartController::class, 'add'])->name('cart.add');
    Route::get('/checkout', [UserCheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [UserCheckoutController::class, 'checkout'])->name('checkout.process');
    Route::get('/checkout/show/{order}', [UserProductController::class, 'order'])->name('checkout.show');
    Route::put('/checkout/pay/{order}', [UserCheckoutController::class, 'pay'])->name('checkout.pay');
    Route::get('/confirmation', [UserConfirmationController::class, 'index'])->name('confirmation.index');
    Route::put('/confirmation/{order}/reject', [UserConfirmationController::class, 'reject'])->name('confirmation.reject');
    Route::get('/history', [UserHistoryController::class, 'index'])->name('history.index');
    Route::get('/order/show/{order}', [UserProductController::class, 'order'])->name('order.show');
});

// Routes for Guest
Route::middleware('guest')->group(function () {
    Route::get('/store/login', [StoreLoginController::class, 'index'])->name('store.login');
    Route::post('/store/login', [StoreLoginController::class, 'login'])->name('store.login.post');

    Route::get('/store/register', [StoreRegisterController::class, 'index'])->name('store.register');
    Route::post('/store/register', [StoreRegisterController::class, 'register'])->name('store.register.post');

    Route::get('/login', [UserLoginController::class, 'index'])->name('login');
    Route::post('/login', [UserLoginController::class, 'login'])->name('login.post');

    Route::get('/register', [UserRegisterController::class, 'index'])->name('register');
    Route::post('/register', [UserRegisterController::class, 'register'])->name('register.post');
});
