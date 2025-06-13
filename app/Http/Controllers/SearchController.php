<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FilmData;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = strtolower($request->input('query'));
        $films = FilmData::all();

        $results = array_filter($films, function ($film) use ($query) {
            return str_contains(strtolower($film['title']), $query);
        });

        return view('search_results', ['results' => $results, 'query' => $request->input('query')]);
    }
}
