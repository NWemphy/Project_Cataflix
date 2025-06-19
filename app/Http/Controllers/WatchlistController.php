namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function index()
    {
        $films = Auth::user()->watchlist;
        return view('watchlist.index', compact('films'));
    }

    public function store($filmId)
    {
        $user = Auth::user();
        if (!$user->watchlist->contains($filmId)) {
            $user->watchlist()->attach($filmId);
        }

        return back()->with('success', 'Film ditambahkan ke Watchlist.');
    }

    public function destroy($filmId)
    {
        Auth::user()->watchlist()->detach($filmId);
        return back()->with('success', 'Film dihapus dari Watchlist.');
    }
}
