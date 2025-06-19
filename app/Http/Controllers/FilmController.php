<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Film;
use App\Models\Review;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('admin.films-index', compact('films'));
    }

    public function create()
    {
        return view('admin.film-form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer',
            'poster' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'director' => 'nullable|string',
            'duration' => 'nullable|integer',
        ]);

        if ($request->hasFile('poster')) {
            // Simpan poster di folder 'posters' dalam storage/public
            $path = $request->file('poster')->store('posters', 'public');
            // Simpan path dengan prefix 'storage/' agar bisa diakses via asset()
            $data['poster'] = 'storage/' . $path;
        }

        Film::create($data);
        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan.');
    }

    public function edit(Film $film)
    {
        return view('admin.film-form', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer',
            'poster' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'director' => 'nullable|string',
            'duration' => 'nullable|integer',
        ]);
        if ($request->hasFile('poster')) {
            $filename = time() . '_' . $request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('posters', $filename, 'public');
            $data['poster'] = 'storage/' . $path;
        }
        

        $film->update($data);
        return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui.');
    }

    public function destroy(Film $film)
    {
        // Hapus file poster jika ada
        if ($film->poster && Storage::disk('public')->exists(str_replace('storage/', '', $film->poster))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $film->poster));
        }

        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus.');
    }
}
