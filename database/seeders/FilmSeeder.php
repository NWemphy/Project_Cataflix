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
                'poster' => 'storage/Everything.jpeg',
                'description' => 'Seorang ibu imigran terjebak dalam multiverse absurd dan harus menyelamatkan dunia sambil memperbaiki hubungannya dengan keluarga.',
                'director' => 'Daniel Kwan, Daniel Scheinert',
                'duration' => '139',
            ],
            [
                'title' => 'Spider-Man: Across the Spider-Verse',
                'year' => 2023,
                'poster' => '/storage/Spider-Man-spiderverse.jpeg',
                'description' => 'Miles Morales berpetualang ke semesta lain dan bertemu para Spider-People untuk menghentikan ancaman besar.',
                'director' => 'Joaquim Dos Santos, Kemp Powers, Justin K. Thompson',
                'duration' => '140',
            ],
            [
                'title' => 'Oppenheimer',
                'year' => 2023,
                'poster' => '/storage/oppenheimer.jpeg',
                'description' => 'Kisah kompleks J. Robert Oppenheimer, fisikawan jenius yang memimpin Proyek Manhattan dan menciptakan bom atom. Terjebak antara ambisi ilmiah dan konsekuensi moral, hidupnya berubah selamanya di tengah pergolakan sejarah.',
                'director' => 'Christopher Nolan',
                'duration' => '180',
            ],
            [
                'title' => 'Mission: Impossible : Dead Reckoning Part One',
                'year' => 2023,
                'poster' => '/storage/mision_imposible_partone.jpeg',
                'description' => 'Ethan Hunt dan tim IMF menghadapi senjata AI yang bisa mengancam seluruh dunia, dalam aksi tanpa henti dan adegan memukau.',
                'director' => 'Christopher McQuarrie',
                'duration' => '163',
            ],
            [
                'title' => 'The Super Mario Bros. Movie',
                'year' => 2023,
                'poster' => '/storage/supermariobros.jpeg',
                'description' => 'Dua tukang ledeng bersaudara, Mario dan Luigi, tersedot ke dunia magis Mushroom Kingdom. Untuk menyelamatkan Luigi dan menghentikan Bowser, Mario harus bekerja sama dengan Princess Peach dan teman-teman baru.',
                'director' => 'Aaron Horvath & Michael Jelenic',
                'duration' => '92',
            ],
            [
                'title' => 'The Suicide Squad',
                'year' => 2021,
                'poster' => '/storage/suicidesquad.jpeg',
                'description' => 'Sekelompok penjahat super dikirim ke misi bunuh-diri di pulau berbahaya—permadani kekerasan dan humor gelap ala Gunn.',
                'director' => 'James Gunn',
                'duration' => '132',
            ],
            [
                'title' => 'Venom: The Last Dance',
                'year' => 2024,
                'poster' => '/storage/Venom3.jpeg',
                'description' => 'Eddie Brock menghadapi ancaman terbesarnya saat symbiote Venom semakin merasuk dalam hidupnya. Diwarnai humor gelap dan kekacauan symbiote.',
                'director' => 'Kelly Marcel',
                'duration' => '110',
            ],
            [
                'title' => 'Black Clover: Sword of the Wizard King',
                'year' => 2023,
                'poster' => '/storage/black_clover.jpeg',
                'description' => 'Asta menghadapi para mantan Wizard Kings dalam aksi sihir yang intens dan berkesan.',
                'director' => 'Ayataka Tanemura',
                'duration' => '110',
            ],
            [
                'title' => 'Suzume no Tojimari (Suzume)',
                'year' => 2022,
                'poster' => '/storage/Suzume.jpeg',
                'description' => 'Remaja Suzume menutup pintu misterius penyebab bencana, dalam perjalanan penuh keajaiban dan kedewasaan.',
                'director' => 'Makoto Shinkai',
                'duration' => '122',
            ],
            [
                'title' => 'The First Slam Dunk',
                'year' => 2022,
                'poster' => '/storage/firstslamdunk.jpeg',
                'description' => 'Kisah reuni kru basket Shohoku dengan visual baru yang epik dan nostalgia olahraga Jepang.',
                'director' => 'Takehiko Inoue',
                'duration' => '124',
            ],
            [
                'title' => 'Spy x Family Code: White',
                'year' => 2023,
                'poster' => '/storage/spyxfamily.jpeg',
                'description' => 'Keluarga Forger menghadapi misi memasak dan sabotase, komedi mata-mata kocak dan penuh intrik.',
                'director' => 'Takashi Katagiri',
                'duration' => '110',
            ],
            [
                'title' => 'One Piece Film: Red',
                'year' => 2022,
                'poster' => '/storage/onepiece_red.jpeg',
                'description' => 'Luffy dan kru menghadapi Diva Uta, adiknya Shanks, dalam petualangan musik dan aksi epik samudera.',
                'director' => 'Gorō Taniguchi',
                'duration' => '115',
            ],

            [
                'title' => 'Free Guy',
                'year' => 2021,
                'poster' => '/storage/FreeGuy.jpg',
                'description' => 'Seorang kasir bank yang menyadari ia hanyalah salah satu karakter latar belakang dalam sebuah permainan video terbuka, memutuskan untuk menjadi pahlawan dalam kisahnya sendiri…',
                'director' => 'Shawn Levy',
                'duration' => '115',
            ],
            [
                'title' => 'Jungle Cruise',
                'year' => 2021,
                'poster' => '/storage/JungleCruise.jpg',
                'description' => 'Frank (Dwayne Johnson) adalah kapten kapal yang berkharisma. Ia bertemu dengan Lily (Emily Blunt), seorang penjelajah yang berambisi menemukan kebenaran mengenai pohon ajaib yang memiliki kekuatan penyembuh.',
                'director' => 'Jaume Collet-Serra',
                'duration' => '127',
            ],
            [
                'title' => 'Jumanji: The Next Level',
                'year' => 2019,
                'poster' => '/storage/Jumanji_TheNextLevel.jpg',
                'description' => 'Dalam Jumanji: The Next Level, keempat sahabat kembali lagi, tetapi permainannya telah berubah. Mereka harus menjelajah wilayah-wilayah baru demi meloloskan diri dari permainan paling berbahaya di dunia.',
                'director' => 'Jake Kasdan',
                'duration' => '123',
            ],
            [
                'title' => 'Srimulat: Hil yang Mustahal - Babak Pertama',
                'year' => 2022,
                'poster' => '/storage/Srimulat.jpg',
                'description' => 'Kelompok lawak Srimulat yang tengah populer di Jawa, mendadak terganggu penampilannya karena muncul pemain kendang yang lebih lucu bernama Gepeng. Mereka diundang tampil di TV Nasional.',
                'director' => 'Fajar Nugros',
                'duration' => '110',
            ],
            [
                'title' => 'Agak Laen',
                'year' => 2024,
                'poster' => '/storage/Agak_Laen.jpg',
                'description' => 'Empat sekawan mengelola rumah hantu yang sepi hingga terjadi tragedi. Komedi dan horor berpadu dalam perjuangan mereka menghadapi konsekuensi.',
                'director' => 'Muhadkly Acho',
                'duration' => '119',
            ],
            [
                'title' => 'Orphan',
                'year' => 2009,
                'poster' => '/storage/Orphan.jpg',
                'description' => 'Sepasang suami-istri mengadopsi gadis kecil misterius yang ternyata menyimpan masa lalu kelam.',
                'director' => 'Jaume Collet-Serra',
                'duration' => '123',
            ],
            [
                'title' => 'Nocturnal',
                'year' => 2025,
                'poster' => '/storage/Nocturnal.jpg',
                'description' => 'Bae Min-tae, mantan gangster, berusaha mengungkap kematian adiknya dalam drama kriminal penuh misteri.',
                'director' => 'Jin-hwang Kim',
                'duration' => '100',
            ],
            [
                'title' => 'Dark Nuns',
                'year' => 2025,
                'poster' => '/storage/Dark_Nuns.jpg',
                'description' => 'Dua biarawati melawan roh jahat demi menyelamatkan seorang anak, dalam kisah horor spiritual yang mencekam.',
                'director' => 'Kwon Hyeok-jae',
                'duration' => '114',
            ],
            [
                'title' => 'Missing',
                'year' => 2018,
                'poster' => '/storage/Missing.jpg',
                'description' => 'June menggunakan teknologi untuk mencari ibunya yang hilang di Kolombia, tapi justru menemukan lebih banyak misteri.',
                'director' => 'Will Merrick, Nicholas D. Johnson',
                'duration' => '111',
            ],
            [
                'title' => 'Yunan',
                'year' => 2025,
                'poster' => '/storage/Yunan.jpg',
                'description' => 'Seorang penulis Suriah berniat bunuh diri di pulau terpencil, namun hubungan dengan wanita tua mengubah hidupnya.',
                'director' => 'Ameer Fakher Eldin',
                'duration' => '124',
            ],
            [
                'title' => 'Jumbo',
                'year' => 2025,
                'poster' => '/storage/Jumbo.jpg',
                'description' => 'Don yang kerap dirundung bertemu arwah Meri yang meminta bantuan untuk menemukan makam keluarganya.',
                'director' => 'Ryan Adriandhy',
                'duration' => '102',
            ],
            [
                'title' => 'Moana 2',
                'year' => 2024,
                'poster' => '/storage/Moana_2.jpg',
                'description' => 'Moana kembali menjelajahi lautan setelah dipanggil oleh leluhurnya, menuju wilayah yang telah lama hilang.',
                'director' => 'Dana Ledoux Miller, Jason Hand, David Derrick Jr.',
                'duration' => '100',
            ],
            [
                'title' => 'Moana',
                'year' => 2016,
                'poster' => '/storage/Moana.jpg',
                'description' => 'Moana berlayar untuk mencari Maui dan mengembalikan hati Te Fitti demi menyelamatkan pulau dan rakyatnya.',
                'director' => 'Ron Clements, John Musker',
                'duration' => '85',
            ],
            
        ];

        foreach ($films as $film) {
            Film::create($film);
        }
    }
}
