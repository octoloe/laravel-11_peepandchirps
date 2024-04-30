<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified', 'is_banned'])->name('home');


/* Chirps Routes */
Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);


/* Admin Routes */
Route::get('/users', [AdminController::class, 'index'])
    ->name('admin.show.users')
    ->middleware(['auth', 'isAdmin']);


/* Blocked/Unblocked Routes */
Route::put('/users/{user}/block', [AdminController::class, 'block'])
    ->name('users.block')
    ->middleware(['auth', 'isAdmin']);

Route::put('/users/{user}/unblock', [AdminController::class, 'unblock'])
    ->name('users.unblock')
    ->middleware(['auth', 'isAdmin']);