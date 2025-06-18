<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Film;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\SearchController;

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

// Halaman trailer film (video autoplay)
Route::get('/trailer/{id}', function ($id) {
    $film = Film::find($id);

    if (!$film) {
        abort(404);
    }

    return view('trailer', ['film' => $film]);
})->middleware('auth')->name('film.trailer');

// Halaman review per film
Route::get('/film/{id}/reviews', [FilmController::class, 'showReviews'])
    ->middleware('auth')
    ->name('film.reviews');

// Route pencarian film + riwayat
Route::get('/search', [SearchController::class, 'search'])
    ->middleware('auth')
    ->name('search');
