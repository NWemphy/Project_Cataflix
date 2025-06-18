<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
{
    // Validasi input user
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:pengguna,email',
        'password' => 'required|min:6|confirmed',
    ]);

    // Buat user baru
    $user = Pengguna::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    // Tidak langsung login, langsung redirect ke login
    return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
}

    public function show()
{
    return view('auth.register');
}
}
