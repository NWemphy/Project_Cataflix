<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Film;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;

// =====================
// Halaman Utama (Public)
// =====================
Route::get('/', function () {
    return view('homePage');
});

// =====================
// Autentikasi
// =====================
// Registrasi
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout (POST, hanya untuk user yang sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
// =====================
// Dashboard & Film (auth only)
// =====================
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        $films = Film::all();
        return view('dashboard', ['films' => $films]);
    })->name('dashboard');

    // Detail film
    Route::get('/film/{id}', function ($id) {
        $film = Film::find($id);
        if (!$film) {
            abort(404);
        }
        return view('film-detail', ['film' => $film]);
    })->name('film.detail');
});

// =====================
// Resource: Pengguna
// =====================
Route::resource('pengguna', PenggunaController::class);
Route::resource('home', PenggunaController::class); // Jika memang beda, jika tidak, hapus salah satu

// =====================
// Fitur Pencarian Film
// =====================
Route::get('/search', [SearchController::class, 'index'])->name('search');