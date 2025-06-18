<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use Notifiable;

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

    public function watchHistories() {
        return $this->hasMany(WatchHistories::class);
    }
    
    public function watchlists() {
        return $this->hasMany(Watchlist::class);
    }
    
    public function reviews() {
        return $this->hasMany(Review::class);
    }
    
    public function reviews() {
        return $this->hasMany(\App\Models\Review::class);
    }

}
