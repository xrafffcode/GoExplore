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
use App\Http\Controllers\Frontend\PlaceController as FrontendPlaceController;
use App\Http\Controllers\Frontend\PreferenceController;
use App\Http\Controllers\Frontend\TourGuideController as FrontendTourGuideController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/destinations', [FrontendPlaceController::class, 'index'])->name('place.index');
Route::get('/destination/{slug}', [FrontendPlaceController::class, 'show'])->name('place.show');

Route::get('/tour-guide/{slug}', [FrontendTourGuideController::class, 'show'])->name('tour-guide.show');

Route::get('/chatbot', [ChatBotController::class, 'index'])->name('chatbot');

Route::post('/save-preference', [PreferenceController::class, 'store'])->name('save-preference');

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
