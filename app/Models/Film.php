<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Film extends Model
{
    protected $fillable = ['title', 'genre', 'release_year', 'rating', 'description'];
}
=======
use App\Models\WatchHistories;

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
>>>>>>> 388b188b235828450f7eaf8296e61953dad73e5f
