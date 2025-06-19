<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Menyimpan review baru
    public function store(Request $request, $filmId)
    {
        $existingReview = Review::where('film_id', $filmId)
                                ->where('user_id', Auth::id())
                                ->first();
        
        if ($existingReview) {
            return redirect()->back()->with('error', 'Anda sudah memberikan review.');
        }
        
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000', // konsisten pakai 'comment'
        ]);

        $film = Film::findOrFail($filmId); // ← titik koma DITAMBAHKAN

        Review::create([
            'film_id' => $film->id, // ← gunakan 'film_id', bukan movie_id
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Review berhasil ditambahkan.');
    }

    // Menampilkan form edit review
    public function edit($id)
    {
        $review = Review::findOrFail($id);

        if ($review->user_id !== Auth::id()) {
            abort(403);
        }

        return view('reviews.edit', compact('review'));
    }

    // Menyimpan perubahan review
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        if ($review->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('films.show', $review->film_id)
                         ->with('success', 'Review berhasil diperbarui.');
    }

    // Menghapus review
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        if ($review->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak bisa menghapus review ini.');
        }

        $review->delete();

        return redirect()->back()->with('success', 'Review berhasil dihapus.');
    }
}
