<?php

use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FeeTierController as AdminFeeTierController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\PageContentController as AdminPageContentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Nursery Website Routes (7 Pages + Privacy Policy)
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/rooms-and-facilities', [PageController::class, 'rooms'])->name('rooms');
Route::get('/fees', [PageController::class, 'fees'])->name('fees');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');

Route::get('/book-a-visit', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/book-a-visit', [BookingController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('bookings.store');

/*
|--------------------------------------------------------------------------
| Authenticated User & Admin Management Routes
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Bookings Management (FR-05 & FR-07)
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])->name('bookings.show');
    Route::patch('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.update-status');
    Route::patch('/bookings/{booking}/notes', [AdminBookingController::class, 'updateNotes'])->name('bookings.update-notes');
    Route::delete('/bookings/{booking}', [AdminBookingController::class, 'destroy'])->name('bookings.destroy');
    Route::post('/bookings/{booking}/anonymize', [AdminBookingController::class, 'anonymize'])->name('bookings.anonymize');

    // Fee Tiers (Calculator rates)
    Route::get('/fees', [AdminFeeTierController::class, 'index'])->name('fees.index');
    Route::post('/fees', [AdminFeeTierController::class, 'store'])->name('fees.store');
    Route::put('/fees/{feeTier}', [AdminFeeTierController::class, 'update'])->name('fees.update');
    Route::delete('/fees/{feeTier}', [AdminFeeTierController::class, 'destroy'])->name('fees.destroy');

    // Gallery CMS
    Route::get('/gallery', [AdminGalleryController::class, 'index'])->name('gallery.index');
    Route::post('/gallery', [AdminGalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/{galleryImage}', [AdminGalleryController::class, 'destroy'])->name('gallery.destroy');

    // Page Content CMS
    Route::get('/cms', [AdminPageContentController::class, 'index'])->name('cms.index');
    Route::post('/cms', [AdminPageContentController::class, 'update'])->name('cms.update');
});

require __DIR__.'/auth.php';
