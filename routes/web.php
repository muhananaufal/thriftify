<?php

use App\Http\Controllers\auth\store\DashboardController as StoreDashboardController;
use App\Http\Controllers\auth\store\LoginController as StoreLoginController;
use App\Http\Controllers\auth\store\LogoutController as StoreLogoutController;
use App\Http\Controllers\auth\store\RegisterController as StoreRegisterController;
use App\Http\Controllers\auth\user\LoginController as UserLoginController;
use App\Http\Controllers\auth\user\LogoutController as UserLogoutController;
use App\Http\Controllers\auth\user\ProfileController as UserProfileController;
use App\Http\Controllers\auth\user\RegisterController as UserRegisterController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Routes for Store
// Only for logged store users
Route::middleware(['auth:store', 'store'])->group(function () {

    Route::middleware('auth:store')->group(function () {
        // Store Dashboard
        Route::get('/store/dashboard', [StoreDashboardController::class, 'index'])->name('store.dashboard');
        // Store Logout
        Route::get('/store/logout', [StoreLogoutController::class, 'logout'])->name('store.logout');
    });
});

// Routes for User
// Only for logged users
Route::middleware(['auth:web', 'user'])->group(function () {
    Route::middleware('auth:user')->group(function () {
        // User Profile
        Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');

        // User Logout
        Route::get('/user/logout', [UserLogoutController::class, 'logout'])->name('user.logout');
    });
});

// Only for guest store users
Route::middleware(['guest'])->group(function () {
    // Store Login
    Route::get('/store/login', [StoreLoginController::class, 'index'])->name('store.login');
    Route::post('/store/login', [StoreLoginController::class, 'login'])->name('store.login.post');

    // Store Register
    Route::get('/store/register', [StoreRegisterController::class, 'index'])->name('store.register');
    Route::post('/store/register', [StoreRegisterController::class, 'register'])->name('store.register.post');
    // User Login
    Route::get('/user/login', [UserLoginController::class, 'index'])->name('user.login');
    Route::post('/user/login', [UserLoginController::class, 'login'])->name('user.login.post');

    // User Register
    Route::get('/user/register', [UserRegisterController::class, 'index'])->name('user.register');
    Route::post('/user/register', [UserRegisterController::class, 'register'])->name('user.register.post');
});