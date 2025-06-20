<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Film;
use App\Models\Review;
use App\Models\Watchlist;

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

    public function show($id)
{
    $film = Film::findOrFail($id);
    $inWatchlist = false;

    if (Auth::check()) {
        $inWatchlist = Watchlist::where('user_id', Auth::id())
                                            ->where('movie_id', $id)
                                            ->exists();
    }

    return view('film-detail', [
        'film' => $film,
        'inWatchlist' => $inWatchlist
    ]);
}

public function storeReview(Request $request, $filmId)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Login diperlukan untuk memberi review.');
    }

    // Cek duplikat review
    $existing = Review::where('user_id', Auth::id())
                      ->where('film_id', $filmId)
                      ->first();

    if ($existing) {
        return redirect()->back()->with('error', 'Kamu sudah memberi review untuk film ini.');
    }

    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'content' => 'required|string',
    ]);

    Review::create([
        'film_id' => $filmId,
        'user_id' => Auth::id(),
        'rating' => $request->rating,
        'content' => $request->content,
    ]);

    return redirect()->back()->with('success', 'Review berhasil ditambahkan!');
}
}
