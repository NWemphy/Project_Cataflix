<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Menyimpan review baru
    public function store(Request $request, $movie_id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        $film = Film ::findOrFail ($movie_id)

        $existingReview = Review::where ('movie_Id', $movie_id)
                                ->where ('user_id', Auth::id())
                                ->first();
        if ($existingReview) {
            return redirect ()->back()->with('error', 'Anda sudah memberikan review.');
        }

        Review::create([
            'movie_id' => $movie_id,
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

        // Opsional: pastikan user hanya bisa edit review miliknya
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
            'review' => 'required|string|max:1000',
        ]);

        $review->update([
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->route('films.show', $review->movie_id)->with('success', 'Review berhasil diperbarui.');
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