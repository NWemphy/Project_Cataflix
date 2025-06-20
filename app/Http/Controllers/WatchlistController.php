<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watchlist;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function toggle($id)
    {
        $userId = Auth::id();

        $existing = Watchlist::where('user_id', $userId)
                             ->where('movie_id', $id)
                             ->first();

        if ($existing) {
            $existing->delete();
            return redirect()->back()->with('success', 'Film telah dihapus dari watchlist.');
        } else {
            Watchlist::create([
                'user_id' => $userId,
                'movie_id' => $id,
            ]);
            return redirect()->back()->with('success', 'Film telah ditambahkan ke watchlist.');
        }
    }

    public function index()
    {
        $watchlist = Watchlist::with('movie')
                        ->where('user_id', Auth::id())
                        ->get();

        return view('index', compact('watchlist'));
    }
}

