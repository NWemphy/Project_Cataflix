<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    public function run()
    {
        $films = [
            [
                'title' => 'Everything Everywhere All At Once',
                'year' => 2022,
                'poster' => 'https://example.com/poster1.jpg',
                'description' => 'Seorang ibu imigran terjebak dalam multiverse absurd dan harus menyelamatkan dunia sambil memperbaiki hubungannya dengan keluarga.',
                'director' => 'Daniel Kwan, Daniel Scheinert',
                'duration' => '139', // dalam menit
            ],
            [
                'title' => 'Spider-Man: Across the Spider-Verse',
                'year' => 2023,
                'poster' => 'https://example.com/poster2.jpg',
                'description' => 'Miles Morales berpetualang ke semesta lain dan bertemu para Spider-People untuk menghentikan ancaman besar.',
                'director' => 'Joaquim Dos Santos, Kemp Powers, Justin K. Thompson',
                'duration' => '140',
            ],
            [
                'title' => 'Oppenheimer',
                'year' => 2023,
                'poster' => 'https://example.com/poster3.jpg',
                'description' => 'Kisah kehidupan J. Robert Oppenheimer, fisikawan di balik proyek bom atom.',
                'director' => 'Christopher Nolan',
                'duration' => '180',
            ],
            // Tambah film lainnya sesuai kebutuhan
        ];

        foreach ($films as $film) {
            Film::create($film);
        }
    }
}