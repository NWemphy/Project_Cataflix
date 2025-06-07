<?php

namespace App\Helpers;

class FilmData
{
    public static function all()
    {
        return [
            1 => [
                'title' => 'The Matrix',
                'year' => 1999,
                'poster' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg',
                'description' => 'Seorang hacker bernama Neo menemukan kenyataan dunia yang sebenarnya...',
                'director' => 'The Wachowskis',
                'duration' => '136 menit',
            ],
            2 => [
                'title' => 'Transformer',
                'year' => 2007,
                'poster' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/5dmQYVKOKrI55NlxJOktJv8jEnB.jpg',
                'description' => 'Pertempuran antara Autobots dan Decepticons berlangsung di bumi...',
                'director' => 'Michael Bay',
                'duration' => '144 menit',
            ],
            3 => [
                'title' => 'Interstellar',
                'year' => 2014,
                'poster' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/rAiYTfKGqDCRIIqo664sY9XZIvQ.jpg',
                'description' => 'Perjalanan luar angkasa untuk menyelamatkan umat manusia...',
                'director' => 'Christopher Nolan',
                'duration' => '169 menit',
            ],
        ];
    }
}
