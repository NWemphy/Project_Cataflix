<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
