<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ListingDetailsController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::name('frontend.')->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::get('/listings/{listing}', ListingDetailsController::class)->name('listing-details');
});

// Admin Dashboard Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('admin.dashboard');
    Route::resource('listings', ListingController::class, ['as' => 'admin']);
});

require __DIR__ . '/auth.php';
