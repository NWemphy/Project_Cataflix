<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homePage');
});

use App\Http\Controllers\PenggunaController;

Route::resource('pengguna', PenggunaController::class);

Route::resource('home', PenggunaController::class);

