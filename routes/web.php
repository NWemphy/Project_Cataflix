<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Film;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Halaman utama
Route::get('/', function () {
    return view('homePage');
});

// Resource pengguna
Route::resource('pengguna', PenggunaController::class);
Route::resource('home', PenggunaController::class);

// Halaman registrasi
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard (hanya bisa diakses setelah login)
Route::get('/dashboard', function () {
    $films = Film::all();
    return view('dashboard', ['films' => $films]);
})->middleware('auth')->name('dashboard');

// Detail film
Route::get('/film/{id}', function ($id) {
    $film = Film::find($id); // pakai Eloquent find

    if (!$film) {
        abort(404);
    }

    return view('film-detail', ['film' => $film]);
})->middleware('auth')->name('film.detail');

//Review film
Route::middleware(['auth'])->group(function () {
    Route::post('/films/{movie}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    
    Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
    Route::post('/watchlist/{film}', [WatchlistController::class, 'store'])->name('watchlist.store');
    Route::delete('/watchlist/{film}', [WatchlistController::class, 'destroy'])->name('watchlist.destroy');
});
