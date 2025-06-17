<div class="md:w-1/3 overflow-y-auto max-h-[500px] space-y-6 pr-4">
    @php
        $films = [
            ['title' => 'Monsters Inc', 'image' => 'monsters.jpg'],
            ['title' => 'Big Hero 6', 'image' => 'big-hero.jpg'],
            ['title' => 'Up', 'image' => 'up.jpg'],
            ['title' => 'Zootopia', 'image' => 'zootopia.jpg'],
        ];
    @endphp

    @foreach ($films as $film)
        <div class="bg-gray-900 rounded-lg shadow-md p-2 hover:scale-105 transition-transform">
            <img src="{{ asset('img/' . $film['image']) }}" alt="{{ $film['title'] }}" class="rounded-md w-full mb-2">
            <h3 class="text-white text-sm font-semibold text-center">{{ $film['title'] }}</h3>
        </div>
    @endforeach
</div>
