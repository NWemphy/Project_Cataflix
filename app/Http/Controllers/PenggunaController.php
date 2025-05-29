<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Tampilkan semua data pengguna.
     */
    public function index()
    {
        $penggunas = Pengguna::all();
        return view('pengguna.index', compact('penggunas'));
    }

    /**
     * Tampilkan form tambah pengguna.
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Simpan pengguna baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:pengguna,email',
            'password' => 'required|min:6',
            'role'     => 'nullable|string',
            'avatar'   => 'nullable|string',
        ]);

        Pengguna::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role ?? 'user',
            'avatar'   => $request->avatar,
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail pengguna tertentu.
     */
    public function show(Pengguna $pengguna)
    {
        return view('pengguna.show', compact('pengguna'));
    }

    /**
     * Tampilkan form edit pengguna.
     */
    public function edit(Pengguna $pengguna)
    {
        return view('pengguna.edit', compact('pengguna'));
    }

    /**
     * Update data pengguna.
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:pengguna,email,' . $pengguna->id,
            'password' => 'nullable|min:6',
            'role'     => 'nullable|string',
            'avatar'   => 'nullable|string',
        ]);

        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        if ($request->password) {
            $pengguna->password = Hash::make($request->password);
        }
        $pengguna->role = $request->role;
        $pengguna->avatar = $request->avatar;
        $pengguna->save();

        return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Hapus pengguna.
     */
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}