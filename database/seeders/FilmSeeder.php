<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Helpers\FilmData;

class FilmSeeder extends Seeder
{
    public function run()
    {
        $films = FilmData::all();

        foreach ($films as $film) {
            Film::create([
                'title' => $film['title'],
                'year' => $film['year'],
                'poster' => $film['poster'],
                'description' => $film['description'],
                'director' => $film['director'],
                'duration' => $film['duration'],
            ]);
        }
    }
}
