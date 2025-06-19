<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watchlist;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function index()
    {
        $watchlists = Watchlist::with('film')
                               ->where('user_id', Auth::id())
                               ->get();

        return view('watchlist.index', compact('watchlists'));
    }

    public function store($filmId)
    {
        $film = Film::findOrFail($filmId);

        $alreadyAdded = Watchlist::where('film_id', $film->id)
                                 ->where('user_id', Auth::id())
                                 ->exists();

        if ($alreadyAdded) {
            return redirect()->back()->with('error', 'Film sudah ada di watchlist.');
        }

        Watchlist::create([
            'film_id' => $film->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Film ditambahkan ke watchlist.');
    }

    public function destroy($id)
    {
        $watchlist = Watchlist::findOrFail($id);

        if ($watchlist->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Tidak diizinkan menghapus.');
        }

        $watchlist->delete();

        return redirect()->route('watchlist.index')->with('success', 'Film dihapus dari watchlist.');
    }
}
