<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    protected $table = 'pengguna';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function watchlists()
    {
        return $this->hasMany(Watchlist::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}