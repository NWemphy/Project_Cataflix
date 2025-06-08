<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WatchHistories extends Model
{
    protected $fillable = ['user_id', 'movie_id', 'watched_at', 'progress'];

    public function user() {
        return $this->belongsTo(Pengguna::class);
    }

    public function movie() {
        return $this->belongsTo(Film::class);
    }
}
