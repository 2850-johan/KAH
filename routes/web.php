<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// This file is part of the Laravel framework.
// It defines the web routes for the application, including the home page,
// dashboard, and profile management routes. It also includes the Google authentication routes.
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Dashboard pour les admins
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Dashboard pour les intervenants
Route::middleware(['auth', 'role:intervenant'])->group(function () {
    Route::get('/intervenant/dashboard', function () {
        return view('intervenant.dashboard');
    })->name('intervenant.dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Route to redirect to Google's OAuth page
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');

// Route to handle the callback from Google
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');



