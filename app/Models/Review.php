<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'film_id', 'rating', 'content'];

    public function user() {
        return $this->belongsTo(Pengguna::class);
    }

    public function film() {
        return $this->belongsTo(Film::class, 'film_id');
    }
}