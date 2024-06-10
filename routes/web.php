<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Openbare routes
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Beveiligde routes
Route::middleware(['auth'])->group(function () {
    Route::get('/books', [BookController::class, 'index']);
    Route::post('/cart', [BookController::class, 'addToCart']);
    Route::get('/cart', [OrderController::class, 'showCart']);
    Route::post('/checkout', [OrderController::class, 'checkout']);

    Route::get('/admin', [AdminController::class, 'index']);
    Route::post('/admin/book', [AdminController::class, 'store']);
    Route::delete('/admin/book/{id}', [AdminController::class, 'destroy']);

    // Voeg een route toe voor het afmelden
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
