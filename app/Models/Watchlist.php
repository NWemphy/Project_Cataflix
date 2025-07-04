<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    protected $fillable = ['user_id', 'movie_id'];

    public function user() {
        return $this->belongsTo(Pengguna::class);
    }

    public function movie() {
        return $this->belongsTo(Film::class, 'movie_id');
    }

}

