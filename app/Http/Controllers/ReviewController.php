<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function submit(Request $request, $id)
    {
        $existing = Review::where('user_id', Auth::id())
                          ->where('film_id', $id)
                          ->first();

        if ($existing) {
            return redirect()->route('film.show', $id)
                             ->with('error', 'Kamu sudah memberikan review untuk film ini.')
                             ->withInput();
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'film_id' => $id,
            'rating' => $validated['rating'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('film.show', $id)
                         ->with('success', 'Review berhasil dikirim!');
    }
}