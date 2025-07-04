<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Film;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\FilmController;



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
    
Route::get('/film/{id}', [FilmController::class, 'show'])->name('film.detail');});

// REVIEW
Route::post('/films/{film}/reviews', [ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->middleware('auth')->name('reviews.destroy');

// WATCHLIST
Route::get('/watchlist', [WatchlistController::class, 'index'])->middleware('auth')->name('watchlist.index');
Route::post('/watchlist/{film}', [WatchlistController::class, 'store'])->middleware('auth')->name('watchlist.store');
Route::delete('/watchlist/{id}', [WatchlistController::class, 'destroy'])->middleware('auth')->name('watchlist.destroy');



// =====================
// Resource: Pengguna
// =====================
Route::resource('pengguna', PenggunaController::class);
Route::resource('home', PenggunaController::class); // Jika memang beda, jika tidak, hapus salah satu

// =====================
// Fitur Pencarian Film
// =====================
Route::get('/search', [SearchController::class, 'index'])->name('search');


Route::middleware(['auth'])->group(function () {
    Route::group([
        'middleware' => function ($request, $next) {
            if (optional(Auth::user())->role === 'admin') {
                return $next($request);
            }
            abort(403, 'Akses ditolak.');
        }
    ], function () {
        Route::resource('films', FilmController::class);
    });
});

Route::post('/film/{id}/review', [ReviewController::class, 'submit'])
    ->middleware('auth')
    ->name('review.submit');

Route::post('/film/{id}/review', [FilmController::class, 'storeReview'])->middleware('auth')->name('review.submit');

Route::post('/watchlist/toggle/{id}', [WatchlistController::class, 'toggle'])->name('watchlist.toggle')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
    Route::post('/watchlist/toggle/{id}', [WatchlistController::class, 'toggle'])->name('watchlist.toggle');
});
