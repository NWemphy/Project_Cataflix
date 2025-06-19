<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WatchHistories;
//use App\Models\Film;

class Film extends Model
{
    protected $table = 'film'; 

    protected $fillable = [
        'title',
        'year',
        'poster',
        'description',
        'director',
        'duration',
    ];

    public function watchHistories() {
        return $this->hasMany(WatchHistories::class);
    }
    
    public function watchlists() {
        return $this->hasMany(Watchlist::class);
    }
    
    public function reviews() {
        return $this->hasMany(Review::class);
    }
}

// class FilmController extends Controller
// {
//     public function show($id)
//     {
//         $film = Film::with(['watchlists', 'reviews.user'])->findOrFail($id);

//         return view('films.show', compact('film'));
//     }
// }