<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
