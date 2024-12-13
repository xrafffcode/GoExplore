<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PlaceCategoryController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TourGuideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\ChatBotController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/chatbot', [ChatBotController::class, 'index'])->name('chatbot');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('place-category', PlaceCategoryController::class);
    Route::resource('place', PlaceController::class);
    Route::resource('tour-guide', TourGuideController::class);

    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
