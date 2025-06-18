<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'movie_id', 'rating', 'review'];

    public function user() {
        return $this->belongsTo(Pengguna::class);
    }

    public function movie() {
        return $this->belongsTo(Film::class);
    }

    public function film() {
        return $this->belongsTo(\App\Models\Film::class);
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

}
