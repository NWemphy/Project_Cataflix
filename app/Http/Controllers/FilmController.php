<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Film;
use App\Models\Review;

class FilmController extends Controller
{
    // Menampilkan semua review untuk film tertentu
    public function showReviews($id)
    {
        $film = Film::with('reviews.user')->findOrFail($id);
        return view('film.reviews', compact('film'));
    }

    // Menyimpan review dari pengguna
    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'film_id' => $id,
            'rating' => $request->rating,
            'content' => $request->content,
        ]);

        return redirect()->route('film.reviews', $id)->with('success', 'Review berhasil ditambahkan!');
    }
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
            $data['poster'] = $request->file('poster')->store('posters', 'public');
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
            if ($film->poster && Storage::disk('public')->exists(str_replace('storage/', '', $film->poster))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $film->poster));
            }
            $path = $request->file('poster')->store('', 'public');
            $data['poster'] = 'storage/' . $path;
            
        }
        
        $film->update($data);
        return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui.');
    }

    public function destroy(Film $film)
    {
        if ($film->poster) Storage::disk('public')->delete($film->poster);
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus.');
    }
}