{{-- resources/views/watchlist.blade.php --}}
@extends('layouts.app') {{-- kalau kamu pakai layout utama, bisa diubah sesuai nama layout-mu --}}

@section('content')
<div class="flex flex-col md:flex-row gap-4 p-6">

    {{-- Bagian kanan: Watchlist Film --}}
    <div class="md:w-1/3 overflow-y-auto max-h-[500px] space-y-6 pr-4">
        @php
            $films = [
                ['title' => 'Monsters Inc', 'image' => 'monsters.jpg'],
                ['title' => 'Big Hero 6', 'image' => 'big-hero.jpg'],
                ['title' => 'Up', 'image' => 'up.jpg'],
                ['title' => 'Zootopia', 'image' => 'zootopia.jpg'],
            ];
        @endphp

        {{-- Notifikasi --}}
        <div id="notification" class="hidden bg-green-500 text-white text-sm px-4 py-2 rounded mb-4">
            ✔️ Added to Watchlist!
        </div>

        @foreach ($films as $film)
            <div class="bg-gray-900 rounded-lg shadow-md p-2 hover:scale-105 transition-transform">
                <img src="{{ asset('img/' . $film['image']) }}" alt="{{ $film['title'] }}" class="rounded-md w-full mb-2">
                <h3 class="text-white text-sm font-semibold text-center mb-1">{{ $film['title'] }}</h3>

                {{-- Tombol + Watchlist --}}
                <div class="text-center">
                    <button 
                        onclick="showNotification()" 
                        class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded"
                    >
                        + Add to Watchlist
                    </button>

                    {{-- Tombol Watch Trailer --}}
            <a 
                href="{{ route('film.trailer', ['id' => $loop->index + 1]) }}" 
                class="inline-block mt-2 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold px-3 py-1 rounded"
            >
                ▶ Watch Trailer
            </a>
        </div>
    </div>
@endforeach
