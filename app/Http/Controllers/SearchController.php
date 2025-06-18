<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\SearchHistory;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string|max:255',
        ]);

        $keyword = $request->input('keyword');

        // Simpan ke tabel search_histories jika user login
        if (Auth::check()) {
            SearchHistory::create([
                'user_id' => Auth::id(),
                'keyword' => $keyword,
            ]);
        }

        // Cari film berdasarkan judul
        $films = Film::where('title', 'LIKE', '%' . $keyword . '%')->get();

        return view('search-result', [
            'films' => $films,
            'keyword' => $keyword,
        ]);
    }
}
