namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Film;
use Illuminate\Http\Request;
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

        Review::create([
            'user_id' => Auth::id(),
            'movie_id' => $movie_id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->route('films.show', $movie_id)->with('success', 'Review berhasil ditambahkan.');
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
            abort(403);
        }

        $movie_id = $review->movie_id;
        $review->delete();

        return redirect()->route('films.show', $movie_id)->with('success', 'Review berhasil dihapus.');
    }
}