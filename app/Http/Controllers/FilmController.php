<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
